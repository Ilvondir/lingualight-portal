<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreConfirmationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (!Auth::check()) return false;
        else if (Auth::user()->role_id!=2 || Auth::user()->confirmed==1) return false;
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
            "subject" => ["required", "min:10", "max:255"],
            "message" => ["required", "min:20"],
            "competences" => ["file"],
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
