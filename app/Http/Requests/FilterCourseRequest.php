<?php

namespace App\Http\Requests;

use App\Http\Controllers\CourseController;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FilterCourseRequest extends FormRequest
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
        $difficulties = ["All", "Easy", "Medium", "Hard"];
        $languages = CourseController::getLanguages();
        array_push($languages, "All");
        $forms = ["All", "Hybrid", "Stationary", "Remote"];

        $headquarters = CourseController::getHeadquarters();
        array_push($headquarters, "All");

        return [
            "title" => "nullable|max:255",
            "language" => [
                "nullable",
                Rule::in($languages),
            ],
            "difficulty" => [
                "nullable",
                Rule::in($difficulties),
            ],
            "form" => Rule::in($forms),
            "headquarter" => Rule::in($headquarters),
            "minPrice" => "nullable|min:0",
            "maxPrice" => "nullable|min:0",
        ];
    }
}
