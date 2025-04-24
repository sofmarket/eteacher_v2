<?php

namespace App\Dto;

class SignupData
{
    public function __construct(
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly string $phone,
        public readonly string $email,
        public readonly string $password,
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            firstName: $data['first_name'],
            lastName: $data['last_name'],
            phone: $data['phone'],
            email: $data['email'],
            password: $data['password'],
        );
    }
} 