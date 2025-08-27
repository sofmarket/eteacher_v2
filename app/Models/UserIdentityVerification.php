<?php

namespace App\Models;

use App\Casts\IdentityStatusCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UserIdentityVerification extends Model implements HasMedia {
    use HasFactory, InteractsWithMedia;

    public $guarded = [];

    public $timestamps = false;

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('photo')
            ->nonQueued();
        $this
            ->addMediaConversion('cin')
            ->nonQueued();
    }


    protected function casts(): array
    {
        return [
            'status'        => IdentityStatusCast::class,
            'attachments'   => 'array'
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

