<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'reference_number' => 'required|min:5',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
