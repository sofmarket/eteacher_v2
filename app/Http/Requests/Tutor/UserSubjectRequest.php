<?php

namespace App\Http\Requests\Tutor;

use Illuminate\Foundation\Http\FormRequest;

class UserSubjectRequest extends FormRequest
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
            'user_subject_group_id' => 'required|exists:user_subject_groups,id',
            'subject_id' => 'required|exists:subjects,id',
            'hour_rate' => 'required|numeric|min:0',
            'description' => 'required|string|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        if($this->isMethod('PUT')) {
            $rules = [
                'hour_rate' => 'required|numeric|min:0',
                'description' => 'required|string|max:1000',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
            'user_subject_group_id.required' => 'Please select a subject group.',
            'user_subject_group_id.exists' => 'The selected subject group is invalid.',
            'subject_id.required' => 'Please select a subject.',
            'subject_id.exists' => 'The selected subject is invalid.',
            'hour_rate.required' => 'Please enter an hourly rate.',
            'hour_rate.numeric' => 'Hourly rate must be a number.',
            'hour_rate.min' => 'Hourly rate must be at least 0.',
            'description.max' => 'Description cannot exceed 1000 characters.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image may not be greater than 2MB.',
        ];
    }

}
