<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "email"=> "bail|required|email|max:255|unique:users",
            "password"=> "bail|required|string|min:8|max:255|confirmed",
            "name"=> "bail|required|string|max:255",
            "password_confirmation"=> "bail|required|string|min:8|max:255",
        ];
    }
}
