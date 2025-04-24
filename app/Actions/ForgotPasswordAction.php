<?php

namespace App\Actions;

use App\Dto\ForgotPasswordData;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class ForgotPasswordAction
{
    /**
     * Handle the password reset request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function handle(ForgotPasswordData $data): string
    {
        $this->ensureIsNotRateLimited($data->username);

        $user = User::findByUsername($data->username)->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'username' => __('auth.username_not_found'),
            ]);
        }

        if ($user->suspended) {
            throw ValidationException::withMessages([
                'username' => __('messages.your_account_is_suspended'),
            ]);
        }

        $status = Password::sendResetLink(
            ['email' => $user->email]
        );

        if ($status !== Password::RESET_LINK_SENT) {
            throw ValidationException::withMessages([
                'username' => __($status),
            ]);
        }

        RateLimiter::hit($this->throttleKey($data->username));

        return $status;
    }

    /**
     * Ensure the request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    private function ensureIsNotRateLimited(string $username): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey($username), 5)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey($username));

        throw ValidationException::withMessages([
            'username' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    private function throttleKey(string $username): string
    {
        return strtolower($username) . '|' . request()->ip();
    }
} 