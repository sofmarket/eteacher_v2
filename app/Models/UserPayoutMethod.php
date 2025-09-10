<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPayoutMethod extends Model
{
    
    protected $guarded = [];

    protected $casts = [
        'payout_details' => 'array',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
