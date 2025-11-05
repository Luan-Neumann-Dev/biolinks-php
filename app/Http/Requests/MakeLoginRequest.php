<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class MakeLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];
    }

    /**
     * Attempt to login in the system
     */
    public function attemptToLogin(): bool
    {
        if ($user = User::where('email', request('email'))->first()) {
            if (Hash::check(request('password'), $user->password)) {
                auth()->login($user);
                return true;
            }
        }
        return false;
    }
}
