<?php

namespace App\Http\Requests\Tutor;

use Illuminate\Foundation\Http\FormRequest;

class UserSubjectSlotRequest extends FormRequest
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
            'user_subject_group_subject_id' => 'required|exists:user_subject_group_subjects,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required|date_format:H:i',
            'duration' => 'required|in:30,60,90,120',
            'session_fee' => 'required|numeric|min:0',
            'spaces' => 'required|integer|min:1|max:100',
            'recurring_booking' => 'nullable|in:weekly,biweekly,monthly',
            'description' => 'required|string|max:2000',
        ];

        if ($this->isMethod('PUT')) {
            $rules = [
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'start_time' => 'required|date_format:H:i',
                'duration' => 'required|in:30,60,90,120',
                'session_fee' => 'required|numeric|min:0',
                'spaces' => 'required|integer|min:1|max:100',
                'recurring_booking' => 'nullable|in:weekly,biweekly,monthly',
                'description' => 'required|string|max:2000',
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
            'user_subject_group_subject_id.required' => 'Please select a subject.',
            'user_subject_group_subject_id.exists' => 'The selected subject is invalid.',
            'start_date.required' => 'Please select a start date.',
            'start_date.date' => 'Start date must be a valid date.',
            'start_date.after_or_equal' => 'Start date must be today or a future date.',
            'end_date.required' => 'Please select an end date.',
            'end_date.date' => 'End date must be a valid date.',
            'end_date.after_or_equal' => 'End date must be after or equal to start date.',
            'start_time.required' => 'Please select a start time.',
            'start_time.date_format' => 'Start time must be in HH:MM format.',
            'duration.required' => 'Please select session duration.',
            'duration.in' => 'Session duration must be 30, 60, 90, or 120 minutes.',
            'session_fee.required' => 'Please enter session fee.',
            'session_fee.numeric' => 'Session fee must be a number.',
            'session_fee.min' => 'Session fee must be at least 0.',
            'spaces.required' => 'Please enter number of seats.',
            'spaces.integer' => 'Number of seats must be a whole number.',
            'session_seats.min' => 'Number of seats must be at least 1.',
            'session_seats.max' => 'Number of seats cannot exceed 100.',
            'recurring_booking.in' => 'Recurring booking must be weekly, biweekly, or monthly.',
            'description.required' => 'Please enter session description.',
            'description.string' => 'Session description must be text.',
            'session_description.max' => 'Session description cannot exceed 2000 characters.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Convert session duration to minutes if needed
        if ($this->has('duration')) {
            $duration = $this->input('duration');
            if (is_string($duration) && str_contains($duration, 'hour')) {
                $hours = (int) $duration;
                $this->merge(['duration' => $hours * 60]);
            }
        }
    }
}
