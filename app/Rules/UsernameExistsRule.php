<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class UsernameExistsRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $exists = DB::table('users')
            ->where('email', $value)
            // ->orWhere('phone', $value)
            ->whereNull('deleted_at')
            ->exists();

        if(!$exists) {
            $fail(__('messages.username_not_found'));
        }
    }
}