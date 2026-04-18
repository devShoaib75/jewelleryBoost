<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMaterialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'icon' => 'required|string|max:20',
            'name' => 'required|string|max:255|unique:material_options,name',
            'sub_text' => 'required|string|max:500',
            'price' => 'required|numeric|min:0|max:999999.99',
            'sort_order' => 'required|integer|min:1|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'icon.required' => 'Icon is required',
            'name.unique' => 'Material name already exists',
            'price.max' => 'Price cannot exceed 999,999.99 BDT',
            'sort_order.max' => 'Sort order cannot exceed 1000',
        ];
    }
}
