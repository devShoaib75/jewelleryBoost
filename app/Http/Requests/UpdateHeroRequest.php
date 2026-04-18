<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHeroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'badge' => 'required|string|max:255',
            'title_main' => 'required|string|max:255',
            'title_highlight' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'cta_text' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'badge.required' => 'Badge text is required',
            'title_main.required' => 'Main title is required',
            'title_highlight.required' => 'Highlight title is required',
            'subtitle.required' => 'Subtitle is required',
            'cta_text.required' => 'Call-to-action text is required',
        ];
    }
}
