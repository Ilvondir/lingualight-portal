<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Auth::user()->id == 3) return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $difs = ["A1", "A2", "B1", "B2", "C1", "C2"];

        return [
            "name" => ["required", "min:10", "max:255", Rule::unique('courses')->ignore(request()->route("id"))],
            "language" => ["required", "min:3", "max:255"],
            "difficulty" => Rule::in($difs),
            "headquarter" => ["required", "min:2", "max:255"],
            "price" => ["required", "numeric", "min:0"],
            "start" => ["required", "date", "after:today"],
            "hours" => ["required", "integer", "min:0"],
            "form" => Rule::in(["Stationary", "Hybrid", "Remote"]),
            "description" => ["required", "min:50", Rule::unique('courses')->ignore(request()->route("id"))],
        ];
    }
}
