<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class AdminEditDataRequest extends FormRequest
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
        return [
            "name" => 'required|min:2|max:255',
            "surname" => 'required|min:2|max:255',
            "login" => ["required", "min:6", "max:30", Rule::unique('users')->ignore(request()->route("id"))],
            "email" => ["required", "min:7", "max:255", "email", Rule::unique('users')->ignore(request()->route("id"))],
            "password" => "nullable|min:7|max:255|required_with:repeatPassword|same:repeatPassword",
            "repeatPassword" => "nullable|min:7|max:255",
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
