<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSellerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:sellers',
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name parameter is required.',
            'name.string' => 'The name parameter must be a string.',
            'name.min' => 'The name parameter must be at least 3 characters.',
            'name.max' => 'The name parameter may not be greater than 255 characters.',
            'email.required' => 'The email parameter is required.',
            'email.email' => 'The email parameter must be a valid email address.',
            'email.max' => 'The email parameter may not be greater than 255 characters.',
            'email.unique' => 'The email address has already been taken.',
        ];
    }
}
