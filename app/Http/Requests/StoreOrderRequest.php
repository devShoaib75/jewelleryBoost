<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarouselRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'icon' => 'required|string|max:20',
            'tag' => 'required|string|max:255',
            'caption' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048|dimensions:max_width=2000,max_height=2000',
            'sort_order' => 'required|integer|min:1|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'image.image' => 'File must be an image',
            'image.max' => 'Image size cannot exceed 2MB',
            'image.dimensions' => 'Image dimensions cannot exceed 2000x2000 pixels',
            'sort_order.max' => 'Sort order cannot exceed 1000',
        ];
    }
}
