<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conversation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'last_time_message',
    ];

    protected $casts = [
        'last_time_message' => 'datetime',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function messages()
    {
        return $this->hasMany(ConversationMessage::class);
    }

    public function scopeByUser($query)
    {
        return $query->where('sender_id', auth()->id())->orWhere('receiver_id', auth()->id());
    }

    public function scopeSearch($query, $search)
    {
        $userId = auth()->id();

        return $query->where(function ($query) use ($userId, $search) {
            // Case 1: Authenticated user is sender, search receiver's profile
            $query->where('sender_id', $userId)
                ->whereHas('receiver.profile', function ($profileQuery) use ($search) {
                    $profileQuery->where('first_name', 'like', '%' . $search . '%')
                        ->orWhere('last_name', 'like', '%' . $search . '%');
                })
                // Case 2: Authenticated user is receiver, search sender's profile
                ->orWhere(function ($subQuery) use ($userId, $search) {
                    $subQuery->where('receiver_id', $userId)
                        ->whereHas('sender.profile', function ($profileQuery) use ($search) {
                            $profileQuery->where('first_name', 'like', '%' . $search . '%')
                                ->orWhere('last_name', 'like', '%' . $search . '%');
                        });
                });
        });
    }




    public function scopeWithMessages($query)
    {
        return $query->with('messages');
    }
}