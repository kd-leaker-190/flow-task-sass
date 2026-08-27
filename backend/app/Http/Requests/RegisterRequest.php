<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
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
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => [
                'required',
                'string',
                'lowercase',
                'regex:/^[a-zA-Z0-9_\-]+$/',
                'max:255',
                'unique:users,username'
            ],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:users,email'
            ],

            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults()
            ],
        ];
    }

    public function registerNewUser(): User
    {
        $user = User::create($this->validated());

        event(new Registered($user));

        Auth::login($user);

        return $user;
    }
}
