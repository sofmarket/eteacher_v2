<?php

namespace App\Http\Requests\General;

use App\Rules\MatchCurrentPasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'current_password' => [ 'required', new MatchCurrentPasswordRule ],
            'password' => 'required|string|confirmed|min:8',
        ];
    }
}
