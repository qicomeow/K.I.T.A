<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\CommunityItem;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class MessageController extends Controller
{
    public function index()
    {
        $conversations = $this->getConversations();

        return view('messages.index', compact('conversations'));
    }

    public function search(Request $request)
    {
        $search = trim((string) $request->query('q', ''));

        if (mb_strlen($search) < 2) {
            return response()->json([]);
        }

        return response()->json(
            User::where('id', '!=', auth()->id())
                ->where('name', 'like', '%' . $search . '%')
                ->limit(15)
                ->get(['id', 'name'])
        );
    }

    public function start(Request $request, User $user)
    {
        abort_if(
            (int) $user->id === (int) auth()->id(),
            422,
            'You cannot message yourself.'
        );

        $conversation = $this->findOrCreateConversation(
            auth()->id(),
            $user->id
        );

        return redirect()->route('messages.show', $conversation);
    }

    public function startItem(Request $request, CommunityItem $item)
    {
        abort_if(
            (int) $item->user_id === (int) auth()->id(),
            422,
            'You cannot message yourself.'
        );

        $conversation = $this->findOrCreateConversation(
            auth()->id(),
            $item->user_id
        );

        // The item is pending, NOT yet sent as a message.
        return redirect()->route('messages.show', [
            'conversation' => $conversation->id,
            'item' => $item->id,
        ]);
    }

    private function findOrCreateConversation(
        int $firstUserId,
        int $secondUserId
    ): Conversation {
        $ids = [$firstUserId, $secondUserId];
        sort($ids, SORT_NUMERIC);

        [$one, $two] = $ids;
        $key = "general:{$one}:{$two}";

        return DB::transaction(function () use ($one, $two, $key) {
            User::whereIn('id', [$one, $two])
                ->orderBy('id')
                ->lockForUpdate()
                ->get();

            $existing = Conversation::query()
                ->where(function ($query) use ($one, $two) {
                    $query->where(function ($q) use ($one, $two) {
                        $q->where('user_one_id', $one)
                          ->where('user_two_id', $two);
                    })->orWhere(function ($q) use ($one, $two) {
                        $q->where('user_one_id', $two)
                          ->where('user_two_id', $one);
                    });
                })
                ->orderBy('id')
                ->lockForUpdate()
                ->get();

            if ($existing->isEmpty()) {
                return Conversation::firstOrCreate(
                    ['conversation_key' => $key],
                    [
                        'user_one_id' => $one,
                        'user_two_id' => $two,
                        'community_item_id' => null,
                    ]
                );
            }

            $main = $existing->firstWhere(
                'conversation_key',
                $key
            ) ?? $existing->first();

            foreach ($existing as $old) {
                if ((int) $old->id === (int) $main->id) {
                    continue;
                }

                Message::where('conversation_id', $old->id)
                    ->update(['conversation_id' => $main->id]);

                $old->delete();
            }

            if (
                $main->conversation_key !== $key ||
                $main->community_item_id !== null
            ) {
                $main->update([
                    'conversation_key' => $key,
                    'community_item_id' => null,
                ]);
            }

            return $main;
        });
    }

    private function getConversations()
    {
        $userId = auth()->id();

        return Conversation::with([
            'userOne',
            'userTwo',
            'latestMessage',
        ])
        ->where(function ($query) use ($userId) {
            $query->where('user_one_id', $userId)
                  ->orWhere('user_two_id', $userId);
        })
        ->orderByDesc('updated_at')
        ->get()
        ->unique(function ($conversation) use ($userId) {
            return (int) $conversation->user_one_id === (int) $userId
                ? $conversation->user_two_id
                : $conversation->user_one_id;
        })
        ->values();
    }

    public function show(Request $request, Conversation $conversation)
    {
        $this->authorizeParticipant($conversation);

        $originalId = $conversation->id;

        $conversation = $this->findOrCreateConversation(
            $conversation->user_one_id,
            $conversation->user_two_id
        );

        if ((int) $originalId !== (int) $conversation->id) {
            return redirect()->route('messages.show', [
                'conversation' => $conversation->id,
                'item' => $request->query('item'),
            ]);
        }

        $conversation->load(['userOne', 'userTwo']);

        $messages = $conversation->messages()
            ->with([
                'sender:id,name',
                'communityItem:id,user_id,name,type,price,category,location,description,image_path,status',
                'communityItem.user:id,name',
            ])
            ->orderBy('id')
            ->get();

        $conversation->messages()
            ->where('sender_id', '!=', auth()->id())
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        $pendingItem = null;

        if ($request->filled('item')) {
            $pendingItem = CommunityItem::with('user:id,name')->findOrFail(
                $request->query('item')
            );

            $otherId = (int) (
                (int) $conversation->user_one_id === (int) auth()->id()
                    ? $conversation->user_two_id
                    : $conversation->user_one_id
            );

            abort_unless(
                (int) $pendingItem->user_id === $otherId,
                403,
                'This item does not belong to the chat recipient.'
            );
        }

        $conversations = $this->getConversations();

        return view('messages.index', compact(
            'conversation',
            'conversations',
            'messages',
            'pendingItem'
        ));
    }

    public function store(Request $request, Conversation $conversation)
    {
        $this->authorizeParticipant($conversation);

        $validated = $request->validate([
            'body' => ['required', 'string', 'max:5000'],
            'community_item_id' => [
                'nullable',
                'integer',
                'exists:community_items,id',
            ],
        ]);

        $itemId = $validated['community_item_id'] ?? null;

        if ($itemId !== null) {
            $item = CommunityItem::findOrFail($itemId);

            $otherId = (int) (
                (int) $conversation->user_one_id === (int) auth()->id()
                    ? $conversation->user_two_id
                    : $conversation->user_one_id
            );

            if ((int) $item->user_id !== $otherId) {
                throw ValidationException::withMessages([
                    'community_item_id' =>
                        'This item does not belong to the chat recipient.',
                ]);
            }
        }

        $conversation = $this->findOrCreateConversation(
            $conversation->user_one_id,
            $conversation->user_two_id
        );

        $message = DB::transaction(function () use (
            $conversation,
            $validated,
            $itemId
        ) {
            $message = $conversation->messages()->create([
                'sender_id' => auth()->id(),
                'body' => $validated['body'],
                'community_item_id' => $itemId,
            ]);

            $conversation->touch();

            return $message;
        });

        $message->load([
            'sender:id,name',
            'communityItem:id,user_id,name,type,price,category,location,description,image_path,status',
                'communityItem.user:id,name',
        ]);

        if ($request->expectsJson()) {
            return response()->json(
                $this->messageData($message),
                201
            );
        }

        return redirect()->route('messages.show', $conversation);
    }

    public function updateMessage(Request $request, Message $message)
    {
        $this->authorizeMessageOwner($message);

        abort_if(
            $message->deleted_at !== null,
            422,
            'Deleted messages cannot be edited.'
        );

        $validated = $request->validate([
            'body' => ['required', 'string', 'max:5000'],
        ]);

        $message->update([
            'body' => $validated['body'],
            'edited_at' => now(),
        ]);

        $message->conversation->touch();

        $message->load([
            'sender:id,name',
            'communityItem:id,user_id,name,type,price,category,location,description,image_path,status',
                'communityItem.user:id,name',
        ]);

        return response()->json($this->messageData($message));
    }

    public function deleteMessage(Message $message)
    {
        $this->authorizeMessageOwner($message);

        if ($message->deleted_at === null) {
            $message->update([
                'body' => '',
                'community_item_id' => null,
                'deleted_at' => now(),
            ]);

            $message->conversation->touch();
        }

        $message->load([
            'sender:id,name',
            'communityItem:id,user_id,name,type,price,category,location,description,image_path,status',
                'communityItem.user:id,name',
        ]);

        return response()->json($this->messageData($message));
    }

    public function fetch(Request $request, Conversation $conversation)
    {
        $this->authorizeParticipant($conversation);

        $validated = $request->validate([
            'after_id' => ['nullable', 'integer', 'min:0'],
            'sync' => ['nullable', 'boolean'],
        ]);

        $query = $conversation->messages()
            ->with([
                'sender:id,name',
                'communityItem:id,user_id,name,type,price,category,location,description,image_path,status',
                'communityItem.user:id,name',
            ])
            ->orderBy('id');

        if (!$request->boolean('sync')) {
            $query->where('id', '>', $validated['after_id'] ?? 0)
                  ->limit(100);
        }

        $messages = $query->get()
            ->map(fn ($message) => $this->messageData($message));

        $conversation->messages()
            ->where('sender_id', '!=', auth()->id())
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return response()->json($messages);
    }

    public function unreadCount()
    {
        $userId = auth()->id();

        $count = Message::query()
            ->where('sender_id', '!=', $userId)
            ->whereNull('read_at')
            ->whereHas('conversation', function ($query) use ($userId) {
                $query->where(function ($q) use ($userId) {
                    $q->where('user_one_id', $userId)
                      ->orWhere('user_two_id', $userId);
                });
            })
            ->count();

        return response()->json(['count' => $count]);
    }

    private function messageData(Message $message): array
    {
        $item = $message->deleted_at
            ? null
            : $message->communityItem;

        return [
            'id' => $message->id,
            'conversation_id' => $message->conversation_id,
            'sender_id' => $message->sender_id,
            'sender_name' => $message->sender?->name ?? 'User',
            'body' => $message->deleted_at ? '' : $message->body,
            'edited_at' => $message->edited_at?->toIso8601String(),
            'deleted_at' => $message->deleted_at?->toIso8601String(),
            'created_at' => $message->created_at?->toIso8601String(),
            'item' => $item ? [
                'id' => $item->id,
                'name' => $item->name,
                'type' => $item->type,
                'price' => $item->price,
                'status' => $item->status,
                'category' => $item->category,
                'location' => $item->location,
                'description' => $item->description,
                'owner' => $item->user?->name ?? 'Community Member',
                'image_url' => $item->image_path
                    ? asset('storage/' . $item->image_path)
                    : null,
            ] : null,
        ];
    }

    private function authorizeParticipant(Conversation $conversation): void
    {
        abort_unless(
            $conversation->hasParticipant(auth()->id()),
            403,
            'You are not part of this conversation.'
        );
    }

    private function authorizeMessageOwner(Message $message): void
    {
        $this->authorizeParticipant($message->conversation);

        abort_unless(
            (int) $message->sender_id === (int) auth()->id(),
            403,
            'You can only edit or delete your own messages.'
        );
    }
}