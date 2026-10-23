@extends('admin.layout')

@section('title', 'Manage Requests')

@section('content')

<h1>Manage Complaints</h1>

<p class="sub">
    Review submissions, update progress and provide feedback.
</p>

{{-- STATUS FILTERS --}}
<div class="filters">
    @foreach ([
        'all' => 'All',
        'pending' => 'Pending',
        'in_progress' => 'In Progress',
        'resolved' => 'Resolved',
        'rejected' => 'Rejected',
        'cancelled' => 'Cancelled'
    ] as $key => $label)

        <a
            class="{{ ($status ?? 'all') === $key ? 'active' : '' }}"
            href="{{ route('admin.requests', ['status' => $key]) }}"
        >
            {{ $label }}
        </a>

    @endforeach
</div>

{{-- COMPLAINT CARDS --}}
<div class="grid">

    @forelse ($complaints as $c)

        <article class="panel">

            {{-- COMPLAINT HEADER --}}
            <div
                class="actions"
                style="justify-content: space-between;"
            >
                <strong>
                    #{{ $c->id }} · {{ $c->title }}
                </strong>

                <span class="badge {{ $c->status }}">
                    {{ ucwords(str_replace('_', ' ', $c->status)) }}
                </span>
            </div>

            {{-- REPORTER --}}
            <p class="muted">
                {{ $c->user?->name ?? 'Unknown' }}
                ·
                {{ $c->created_at?->format('d M Y') }}
            </p>

            {{-- COMPLAINT DETAILS --}}
            <div class="detail">

                <p>
                    <strong>Category:</strong>
                    {{ ucwords(str_replace('_', ' ', $c->category)) }}
                </p>

                <p>
                    <strong>Location:</strong>
                    {{ $c->location }}
                </p>

                <p>
                    <strong>Description:</strong>
                    {{ $c->description }}
                </p>

                {{-- COMPLAINT IMAGE --}}
                @if ($c->image_path)
                    <p>
                        <a
                            href="{{ asset('storage/' . $c->image_path) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            style="color: #47785b; text-decoration: underline;"
                        >
                            View complaint image ↗
                        </a>
                    </p>
                @endif

                {{-- CANCELLATION REASON --}}
                @if ($c->cancel_reason)
                    <p>
                        <strong>Cancellation reason:</strong>
                        {{ $c->cancel_reason }}
                    </p>
                @endif

                {{-- ADMIN REMARKS --}}
                @if ($c->admin_remarks)
                    <p>
                        <strong>Admin remarks:</strong>
                        {{ $c->admin_remarks }}
                    </p>
                @endif

            </div>

            {{-- UPDATE STATUS FORM --}}
            @if ($c->status !== 'cancelled')

                <form
                    method="POST"
                    action="{{ route('admin.requests.status', $c) }}"
                >
                    @csrf
                    @method('PATCH')

                    <div class="field">
                        <label for="status-{{ $c->id }}">
                            Update status
                        </label>

                        <select
                            id="status-{{ $c->id }}"
                            name="status"
                            required
                        >
                            <option
                                value="in_progress"
                                @selected($c->status === 'in_progress')
                            >
                                Approve / In Progress
                            </option>

                            <option
                                value="resolved"
                                @selected($c->status === 'resolved')
                            >
                                Finished / Resolved
                            </option>

                            <option
                                value="rejected"
                                @selected($c->status === 'rejected')
                            >
                                Rejected
                            </option>
                        </select>
                    </div>

                    <div class="field">
                        <label for="remarks-{{ $c->id }}">
                            Admin remarks (optional)
                        </label>

                        <textarea
                            id="remarks-{{ $c->id }}"
                            name="admin_remarks"
                            rows="2"
                            placeholder="Add notes for the resident..."
                        >{{ $c->admin_remarks }}</textarea>
                    </div>

                    <button type="submit" class="btn">
                        Save Update
                    </button>

                </form>

            @else

                <p class="muted">
                    Cancelled by resident — read only.
                </p>

            @endif

        </article>

    @empty

        <div class="panel">
            No complaints in this category.
        </div>

    @endforelse

</div>

{{-- PAGINATION --}}
<div class="pagination">
    {{ $complaints->links() }}
</div>

@endsection