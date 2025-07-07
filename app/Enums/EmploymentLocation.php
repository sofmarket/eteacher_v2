<?php

namespace App\Enums;

enum EmploymentLocation: string
{
    case ONSITE = 'onsite';
    case REMOTE = 'remote';
    case HYBRID = 'hybrid';

    /**
     * Get the label for the employment location.
     */
    public function label(): string
    {
        return match($this) {
            self::ONSITE => 'Onsite',
            self::REMOTE => 'Remote',
            self::HYBRID => 'Hybrid',
        };
    }

    /**
     * Get all employment locations as an array.
     */
    public static function toArray(): array
    {
        return [
            self::ONSITE->value => self::ONSITE->label(),
            self::REMOTE->value => self::REMOTE->label(),
            self::HYBRID->value => self::HYBRID->label(),
        ];
    }

    /**
     * Get all employment locations as a collection.
     */
    public static function toCollection(): \Illuminate\Support\Collection
    {
        return collect(self::toArray());
    }

    /**
     * Get the employment location from a string value.
     */
    public static function fromString(string $value): ?self
    {
        return match(strtolower($value)) {
            'onsite' => self::ONSITE,
            'remote' => self::REMOTE,
            'hybrid' => self::HYBRID,
            default => null,
        };
    }

    /**
     * Get all values as an array.
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
} 