<?php

namespace App\Enums;

enum SocialPlatforms: string
{
    case FACEBOOK   = 'facebook';
    case X_COM     = 'x_com';
    case LINKEDIN  = 'linkedin';
    case INSTAGRAM = 'instagram';
    case YOUTUBE   = 'youtube';
    case TIKTOK    = 'tiktok';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
