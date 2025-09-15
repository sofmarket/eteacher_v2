<?php

namespace App\Traits;

trait EnumToArray
{

    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function labels(): array
    {
        return array_combine(self::values(), self::names());
    }
   
    public static function label($value): string
    {
        if (method_exists(self::class, 'labels')) {
            $labels = self::labels();
            return $labels[$value] ?? '';
        }
        return '';
    }

    public function labelValue(): string
    {
        return self::label($this->value);
    }

    /**
     * Get all enum cases as an array of value-label pairs.
     *
     * @return array
     */
    public static function forDropdown(): array
    {
        return array_map(
            fn($value) => [
                'value' => $value,
                'label'  => __('statuses.' . $value)
            ],
            self::values()
        );
    }

}
