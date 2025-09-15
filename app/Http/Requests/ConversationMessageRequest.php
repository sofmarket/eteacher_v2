<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConversationMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Check if the user is part of the conversation
        $conversation = $this->route('conversation');
        
        if (!$conversation) {
            return false;
        }
        
        return $conversation->sender_id === auth()->id() || 
               $conversation->receiver_id === auth()->id();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'body' => 'required|string|max:1000|min:1',
        ];

        // Only require receiver_id for store requests
        if ($this->isMethod('post')) {
            $rules['receiver_id'] = 'required|exists:users,id';
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'body.required' => 'Message content is required.',
            'body.string' => 'Message content must be text.',
            'body.max' => 'Message cannot exceed 1000 characters.',
            'body.min' => 'Message cannot be empty.',
            'receiver_id.required' => 'Receiver is required.',
            'receiver_id.exists' => 'Selected receiver does not exist.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'body' => 'message content',
            'receiver_id' => 'receiver',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            // Additional validation for receiver_id
            if ($this->has('receiver_id')) {
                $conversation = $this->route('conversation');
                $receiverId = $this->input('receiver_id');
                
                // Check if receiver is part of the conversation
                if ($conversation && 
                    $receiverId !== $conversation->sender_id && 
                    $receiverId !== $conversation->receiver_id) {
                    $validator->errors()->add('receiver_id', 'The receiver must be part of this conversation.');
                }
                
                // Check if user is not trying to send message to themselves
                // if ($receiverId === auth()->id()) {
                //     $validator->errors()->add('receiver_id', 'You cannot send a message to yourself.');
                // }
            }
        });
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Trim whitespace from message body
        if ($this->has('body')) {
            $this->merge([
                'body' => trim($this->input('body'))
            ]);
        }
    }
}
