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
        $rules = [
            'subject_group_id' => 'required|exists:subject_groups,id',
        ];

        if($this->isMethod('PUT')) {
            $rules = [
                'subject_group_id' => 'required|exists:subject_groups,id',
            ];
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'subject_group_id.required' => 'Please select a subject group.',
            'subject_group_id.exists' => 'The selected subject group is invalid.',
        ];
    }
}
