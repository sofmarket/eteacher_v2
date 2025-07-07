<?php

namespace App\Http\Requests\Tutor;

use App\Enums\EmploymentType;
use App\Enums\EmploymentLocation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;


class ExperienceRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'employment_type' => ['required', 'string', new Enum(EmploymentType::class)],
            'company' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', new Enum(EmploymentLocation::class)],
            'city' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'is_current' => ['boolean'],
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
            'title.required' => 'Job title is required',
            'title.max' => 'Job title cannot be longer than 255 characters',
            'employment_type.required' => 'Employment type is required',
            'employment_type.in' => 'Please select a valid employment type',
            'company.required' => 'Company name is required',
            'company.max' => 'Company name cannot be longer than 255 characters',
            'location.required' => 'Location type is required',
            'location.in' => 'Please select a valid location type',
            'city.required' => 'City is required',
            'city.max' => 'City cannot be longer than 255 characters',
            'start_date.required' => 'Start date is required',
            'start_date.date' => 'Please enter a valid start date',
            'end_date.date' => 'Please enter a valid end date',
            'end_date.after_or_equal' => 'End date must be after or equal to start date',
            'is_current.boolean' => 'Current position must be true or false',
            'description.max' => 'Description cannot be longer than 1000 characters',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'is_current' => $this->boolean('is_current'),
        ]);
    }
} 