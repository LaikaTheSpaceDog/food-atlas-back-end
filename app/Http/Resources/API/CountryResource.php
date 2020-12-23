<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
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
            "name" => $this["NAME"],
            "continent" => $this["CONTINENT"],
            "dish" => $this["DISH"],
            "description" => $this["DESCRIPTION"],
            "photo" => $this["PHOTO"],
            "recipe" => $this["RECIPE"]
        ];
    }
}
