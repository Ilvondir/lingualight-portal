<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $roles = ["User", "Trainer"];
        if (Auth::check()) {
            if (Auth::user()->id == 1) $roles = ["User", "Trainer", "Administrator"];
        }

        return [
            "name" => ["required", "min:2", "max:255"],
            "surname" => ["required", "min:2", "max:255"],
            "login" => ["required", "min:6", "max:30", "unique:users"],
            "email" => ["required", "min:7", "max:255", "unique:users", "email"],
            "password" => ["required", Password::min(7)->mixedCase()->numbers(), "max:255", "required_with:repeatPassword", "same:repeatPassword"],
            "repeatPassword" => ["required"],
            "role" => Rule::in($roles),
        ];
    }

    /**
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        return back()->withInput()->withErrors($validator->errors());
    }

}
