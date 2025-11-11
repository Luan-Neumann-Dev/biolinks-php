<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:30'],
            'description' => ['nullable'],
            'handler' => ['required', Rule::unique('users')->ignoreModel($this->user())],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
