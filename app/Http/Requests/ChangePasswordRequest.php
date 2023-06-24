<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rules\Password;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Auth::check()) return true;
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "oldPassword" => ["required"],
            "password" => ["required", Password::min(7)->mixedCase()->numbers(), "max:255", "required_with:repeatPassword", "same:repeatPassword"],
            "repeatPassword" => ["required"],
        ];
    }

       /**
         *
         * @param Validator $validator
         */
        protected function failedValidation(Validator $validator)
        {
            return back()->withErrors($validator->errors());
        }

}
