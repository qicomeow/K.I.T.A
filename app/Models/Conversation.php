<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        'user_one_id',
        'user_two_id',
        'community_item_id',
    ];

    public function userOne()
    {
        return $this->belongsTo(User::class, 'user_one_id');
    }

    public function userTwo()
    {
        return $this->belongsTo(User::class, 'user_two_id');
    }

    public function communityItem()
    {
        return $this->belongsTo(CommunityItem::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function latestMessage()
    {
        return $this->hasOne(Message::class)->latestOfMany();
    }

    public function hasParticipant(int $userId): bool
    {
        return $this->user_one_id == $userId
            || $this->user_two_id == $userId;
    }

    public function otherUser(int $userId)
    {
        return $this->user_one_id == $userId
            ? $this->userTwo
            : $this->userOne;
    }
}