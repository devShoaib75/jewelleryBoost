<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePublicOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_name' => 'required|string|max:255|regex:/^[a-zA-Z\s\-\']+$/',
            'customer_phone' => 'required|string|regex:/^\+?[\d\s\-\(\)]{10,}$/|max:20',
            'customer_whatsapp' => 'nullable|string|regex:/^\+?[\d\s\-\(\)]{10,}$/|max:20',
            'customer_email' => 'nullable|email:rfc,dns|max:255',
            'delivery_address' => 'required|string|max:500|min:10',
            'city' => 'nullable|string|max:100',
            'necklace_size' => 'nullable|string|max:100',
            'product_name' => 'required|string|max:255',
            'material_option' => 'required|string|max:255',
            'product_price' => 'required|numeric|min:100|max:999999.99',
            'making_charge' => 'required|numeric|min:0|max:999999.99',
            'delivery_charge' => 'required|numeric|min:0|max:999999.99',
            'total_price' => 'required|numeric|min:100|max:999999.99',
            'payment_method' => 'required|string|max:100|in:Bkash / Nagad (Advance),Cash on Delivery',
            'special_notes' => 'nullable|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'customer_name.regex' => 'Customer name can only contain letters, spaces, hyphens, and apostrophes',
            'customer_phone.regex' => 'Please enter a valid phone number (at least 10 digits)',
            'customer_email.email' => 'Please enter a valid email address',
            'delivery_address.min' => 'Delivery address must be at least 10 characters',
            'product_price.min' => 'Product price must be at least 100 BDT',
            'product_price.max' => 'Product price cannot exceed 999,999.99 BDT',
            'total_price.min' => 'Total price must be at least 100 BDT',
            'total_price.max' => 'Total price cannot exceed 999,999.99 BDT',
            'payment_method.in' => 'Invalid payment method selected',
        ];
    }
}
