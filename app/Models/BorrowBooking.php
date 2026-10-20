<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BorrowBooking extends Model
{
    protected $fillable = [
        'community_item_id',
        'borrower_id',
        'start_date',
        'end_date',
        'status',
        'message',
        'owner_response',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function communityItem(): BelongsTo
    {
        return $this->belongsTo(CommunityItem::class);
    }

    public function borrower(): BelongsTo
    {
        return $this->belongsTo(User::class, 'borrower_id');
    }
}