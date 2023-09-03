<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'seller' => 'required|exists:sellers,id',
            'value' => 'required|numeric|min:0.01',
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => 'The provided ID does not exist.',
            'value.required' => 'The value parameter is required.',
            'value.numeric' => 'The value parameter must be a number.',
            'value.min' => 'The value parameter must be greater than zero.'
        ];
    }
}
