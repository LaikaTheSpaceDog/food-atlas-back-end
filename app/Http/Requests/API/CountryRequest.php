<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "NAME" => ["required", "string"],
            "CONTINENT" => ["required", "string"],
            "DISH" => ["required", "string"],
            "DESCRIPTION" => ["required", "string"],
            "PHOTO" => ["required", "string"],
            "RECIPE" => ["required", "string"]
        ];
    }
}
