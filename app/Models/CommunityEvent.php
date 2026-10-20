<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommunityEvent extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category',
        'location',
        'event_date',
        'start_date',
        'end_date',
        'status',
        'deleted_at',
        'cancellation_reason',
    ];

    protected function casts(): array
    {
        return [
            'event_date' => 'datetime',
            'start_date' => 'datetime',
            'end_date' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }

    public function getCurrentStatusAttribute(): string
    {
        if ($this->status === 'cancelled') {
            return 'cancelled';
        }

        if (!$this->start_date || !$this->end_date) {
            return $this->status;
        }

        $now = now();

        if ($now->lt($this->start_date)) {
            return 'upcoming';
        }

        if ($now->lte($this->end_date)) {
            return 'ongoing';
        }

        if ($now->lt($this->end_date->copy()->addDays(7))) {
            return 'ended';
        }

        return 'archived';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}