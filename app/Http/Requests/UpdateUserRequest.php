<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (!Auth::check()) return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => 'required|min:2|max:255',
            "surname" => 'required|min:2|max:255',
            "login" => "required|min:6|max:30",
            "email" => "required|min:7|max:255|email",
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
