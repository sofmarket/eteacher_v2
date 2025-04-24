<?php

namespace App\Dto;

class FcmTokenData
{
    public function __construct(
        public readonly string $device_name,
        public readonly string $fcm_token
    ){}
}