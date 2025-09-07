<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodStoreRequest extends FormRequest
{
    public function validate(array $rules): array
    {
        return [
            'name' => 'nullable|string',
            'price' => 'nullable|numeric',
            'description' => 'nullable|string',
        ];
    }
}
