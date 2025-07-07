<?php

namespace App\Enums;

enum EmploymentType: int
{
    case FULL_TIME = 1;
    case PART_TIME = 2;
    case SELF_EMPLOYED = 3;
    case CONTRACT = 4;

    /**
     * Get the label for the employment type.
     */
    public function label(): string
    {
        return match($this) {
            self::FULL_TIME => 'Full Time',
            self::PART_TIME => 'Part Time',
            self::SELF_EMPLOYED => 'Self Employed',
            self::CONTRACT => 'Contract',
        };
    }

    /**
     * Get all employment types as an array.
     */
    public static function toArray(): array
    {
        return [
            self::FULL_TIME->value => self::FULL_TIME->label(),
            self::PART_TIME->value => self::PART_TIME->label(),
            self::SELF_EMPLOYED->value => self::SELF_EMPLOYED->label(),
            self::CONTRACT->value => self::CONTRACT->label(),
        ];
    }

    /**
     * Get all employment types as a collection.
     */
    public static function toCollection(): \Illuminate\Support\Collection
    {
        return collect(self::toArray());
    }

    /**
     * Get the employment type from a string value.
     */
    public static function fromString(string $value): ?self
    {
        return match(strtolower($value)) {
            'full_time', 'full time' => self::FULL_TIME,
            'part_time', 'part time' => self::PART_TIME,
            'self_employed', 'self employed' => self::SELF_EMPLOYED,
            'contract' => self::CONTRACT,
            default => null,
        };
    }
} 