<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;

class UserCertificate extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    public $timestamps = false;
    protected $table = 'user_certificate';
    protected $guarded = [];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('photo')
            ->nonQueued();
    }

}
