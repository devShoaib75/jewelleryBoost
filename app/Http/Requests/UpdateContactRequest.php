<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email:rfc,dns|max:255',
            'phone' => 'required|string|regex:/^\+?[\d\s\-\(\)]{10,}$/|max:20',
            'whatsapp' => 'required|string|regex:/^\+?[\d\s\-\(\)]{10,}$/|max:20',
            'address' => 'required|string|max:500',
            'facebook' => 'nullable|url|max:500',
            'instagram' => 'nullable|url|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'email.email' => 'Please enter a valid email address',
            'phone.regex' => 'Phone number must be at least 10 digits',
            'whatsapp.regex' => 'WhatsApp number must be at least 10 digits',
            'facebook.url' => 'Facebook URL must be a valid URL',
            'instagram.url' => 'Instagram URL must be a valid URL',
        ];
    }
}
