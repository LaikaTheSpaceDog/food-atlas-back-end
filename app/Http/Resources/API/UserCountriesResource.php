<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;
use App\Http\Resources\API\CountryResource;

class UserCountriesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "countries" => $this->countries->map(function($country){
                return new CountryResource($country);
            }),
        ];
    }
}
