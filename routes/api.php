<?php

use App\Http\Controllers\Api\V1\Admin\PeopleApiController;
use App\Models\Person;

Route::post('register', 'Api\\AuthController@register');
Route::post('login', 'Api\\AuthController@login');

//api endpoints

//Provide the list of people
Route::get('/people',[PeopleApiController::class, 'index']);

//Provide selected people data including planet details
Route::get('people/{id}', function($id) {
    return view('person',[
        'person' => json_decode(Person::with(['homeworld'])->find($id))
    ]);
});
