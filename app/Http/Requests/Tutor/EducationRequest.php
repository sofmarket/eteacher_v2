<?php

namespace App\Http\Requests\Tutor;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
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
            'course_title' => ['required', 'string', 'max:255'],
            'institute_name' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'ongoing' => ['boolean'],
            'description' => ['nullable', 'string', 'max:1000'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'course_title.required' => 'Course title is required',
            'course_title.max' => 'Course title cannot be longer than 255 characters',
            'institute_name.required' => 'Institute name is required',
            'institute_name.max' => 'Institute name cannot be longer than 255 characters',
            'city.required' => 'City is required',
            'city.max' => 'City cannot be longer than 255 characters',
            'start_date.required' => 'Start date is required',
            'start_date.date' => 'Please enter a valid start date',
            'end_date.date' => 'Please enter a valid end date',
            'end_date.after_or_equal' => 'End date must be after or equal to start date',
            'ongoing.boolean' => 'Ongoing must be true or false',
            'description.max' => 'Description cannot be longer than 1000 characters',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'ongoing' => $this->boolean('ongoing'),
        ]);
    }
} 