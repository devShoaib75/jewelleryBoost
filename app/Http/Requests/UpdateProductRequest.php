<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'current_price' => 'required|numeric|min:0|max:999999.99',
            'old_price' => 'required|numeric|min:0|max:999999.99',
            'description' => 'required|string|min:10',
            'gold_purity' => 'required|string|max:255',
            'total_weight' => 'required|string|max:255',
            'stone_setting' => 'required|string|max:255',
            'includes' => 'required|string|max:255',
            'certification' => 'required|string|max:255',
            'delivery' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'current_price.numeric' => 'Current price must be a valid number',
            'current_price.max' => 'Current price cannot exceed 999,999.99 BDT',
            'description.min' => 'Description must be at least 10 characters',
        ];
    }
}
