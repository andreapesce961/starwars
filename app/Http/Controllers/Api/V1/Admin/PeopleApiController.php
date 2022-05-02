<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PeopleApiController extends Controller
{
    public function index()
    {
        return view('people', [
            'people' => json_decode(Person::with(['homeworld'])->get())
        ]);
    }
}
