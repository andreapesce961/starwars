<?php

namespace App\Http\Requests;

use App\Models\Planet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePlanetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('planet_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'diameter' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'rotation_period' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'orbital_period' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'gravity' => [
                'numeric',
            ],
            'population' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'climate' => [
                'string',
                'nullable',
            ],
            'terrain' => [
                'string',
                'nullable',
            ],
            'surface_water' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'residents.*' => [
                'integer',
            ],
            'residents' => [
                'array',
            ],
            'url' => [
                'string',
                'required',
            ],
        ];
    }
}
