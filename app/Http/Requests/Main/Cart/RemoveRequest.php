<?php

namespace App\Http\Requests\Main\Cart;

use Illuminate\Foundation\Http\FormRequest;

class RemoveRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => 'required|integer|exists:products,id'
        ];
    }
}
