<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CommunityItem extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'category',
        'type',
        'price',
        'location',
        'image_path',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function borrowBookings(): HasMany
    {
        return $this->hasMany(BorrowBooking::class, 'community_item_id');
    }
}