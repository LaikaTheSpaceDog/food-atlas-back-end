<?php

namespace App\Http\Controllers\API\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\API\CountryResource;
use App\Http\Resources\API\UserCountriesResource;
use App\Http\Requests\API\Users\UserCountriesRequest;
use App\Models\Country;
use App\Models\User;

class UserCountries extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        if (auth()->user()->id === $user->id ){
            return CountryResource::collection($user->countries);
        } else {
            return "You are not allowed to access other user's data.";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCountriesRequest $request, User $user)
    {
        if(auth()->user()->id === $user->id ){
            $user->setCountries($request->get("countries"));
            return new UserCountriesResource($user);
        } else {
            return "You are not allowed to update other user's data.";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
