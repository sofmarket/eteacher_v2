<?php

namespace App\Dto;

class ForgotPasswordData
{
    public function __construct(
        public readonly string $username,
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            username: $data['username'],
        );
    }
} 