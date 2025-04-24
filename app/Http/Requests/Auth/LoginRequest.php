<?php

namespace App\Http\Requests\Auth;

use App\Actions\UpsertFcmTokenAction;
use App\Dto\FcmTokenData;
use App\Enums\UserType;
use App\Models\User;
use App\Rules\UsernameExists;
use App\Rules\UsernameExistsRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;


class LoginRequest extends FormRequest
{

    public function __construct(
        // public readonly UpsertFcmTokenAction $upsertFcmTokenAction
    ) { }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', new UsernameExistsRule],
            'password' => ['required'],
            'fcm_token' => ['nullable']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'username.exists' => __('auth.failed'),
        ];
    }

    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $user = User::findByUsername($this->input('username'))->first();

        if ($user && $user->suspended) {
            throw ValidationException::withMessages([
                'username' => __("messages.your_account_is_suspended"),
            ]);
        }

        $attribute = isEmail($this->input('username')) ? 'email' : 'phone';

        if (!Auth::guard('web')->attempt([
                $attribute => $this->input('username'),
                'password' => $this->input('password')
            ])) {

            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'username' => __('auth.failed'),
            ]);
        }

        if ($this->only('fcm_token')) {

            $user = User::findByEmail($this->only('username'))->first();

            $fcmData = new FcmTokenData(
                $this->input('username'),
                $this->input('fcm_token')
            );

            // $this->upsertFcmTokenAction->handle($fcmData, $user);
        }

        $user->update([
            'last_signed_at' => now(),
            'last_signed_ip' => $this->ip(),
        ]);

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

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
    public function throttleKey(): string
    {
        return Str::lower($this->input('username')) . '|' . $this->ip();
    }




}