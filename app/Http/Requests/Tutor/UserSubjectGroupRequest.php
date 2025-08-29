<?php

namespace App\Http\Requests\Tutor;

use Illuminate\Foundation\Http\FormRequest;

class UserSubjectGroupRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'subject_groups' => 'required|array',
            'subject_groups.*' => 'required|exists:subject_groups,id',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'subject_groups.required' => 'Please select a subject group.',
            'subject_groups.*.required' => 'Please select a subject group.',
            'subject_groups.*.exists' => 'The selected subject group is invalid.',
        ];
    }
}
