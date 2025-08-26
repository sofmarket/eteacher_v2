<?php

namespace App\Http\Requests\Tutor;

use App\Enums\SocialPlatforms;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class ProfileRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . auth()->id()],
            'phone_number' => ['nullable', 'string', 'max:20'],
            'description' => ['nullable', 'string', 'min:50', 'max:1000'],
            'tagline' => ['nullable', 'string', 'max:255'],
            'keywords' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'exists:cities,name'],
            'zipcode' => ['nullable', 'string', 'max:255'],
            'native_language_id' => ['nullable', 'exists:languages,id'],
            'languages' => ['nullable', 'array'],
            'languages.*' => ['exists:languages,id'],
            'intro_video' => ['nullable', 'url', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'social_profiles' => ['nullable', 'array'],
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
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'This email is already taken',
            'phone.max' => 'Phone number cannot be longer than 20 characters',
            'bio.max' => 'Bio cannot be longer than 1000 characters',
            'tagline.max' => 'Tagline cannot be longer than 255 characters',
            'meta_keywords.max' => 'Meta keywords cannot be longer than 255 characters',
            'address.max' => 'Address cannot be longer than 255 characters',
            'city_id.exists' => 'Selected city is invalid',
            'native_language_id.exists' => 'Selected native language is invalid',
            'languages.max' => 'Languages cannot be longer than 255 characters',
            'intro_video.url' => 'Please enter a valid video URL',
            'intro_video.max' => 'Video URL cannot be longer than 255 characters',
            'image.image' => 'Please upload a valid image file',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif',
            'image.max' => 'Image size should not exceed 2MB',
        ];
    }
} 