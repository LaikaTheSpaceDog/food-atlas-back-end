<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class CountryListRequest extends FormRequest
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
            "countries" => ["required", "array"],
            "countries.*.NAME" => ["required", "string", "unique:App\Models\Country,NAME"],
            "countries.*.CONTINENT" => ["required", "string"],
            "countries.*.DISH" => "string",
            "countries.*.DESCRIPTION" => "string",
            "countries.*.PHOTO" => "string",
            "countries.*.RECIPE" => "string|nullable"
        ];
    }
}
