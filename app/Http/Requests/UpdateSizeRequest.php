<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSizeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $sizeId = $this->route('id');
        return [
            'size_name' => 'required|string|max:255|unique:size_options,size_name,' . $sizeId,
            'length_inches' => 'required|string|max:255',
            'length_cm' => 'required|string|max:255',
            'best_for' => 'required|string|max:255',
            'style' => 'required|string|max:255',
            'sort_order' => 'required|integer|min:1|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'sort_order.max' => 'Sort order cannot exceed 1000',
        ];
    }
}
