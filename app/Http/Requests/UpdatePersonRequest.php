<?php

namespace App\Http\Requests;

use App\Models\Person;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePersonRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('person_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'birth_year' => [
                'string',
                'nullable',
            ],
            'eye_color' => [
                'string',
                'nullable',
            ],
            'gender' => [
                'string',
                'nullable',
            ],
            'hair_color' => [
                'string',
                'nullable',
            ],
            'height' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'mass' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'skin_color' => [
                'string',
                'nullable',
            ],
            'url' => [
                'string',
                'required',
            ],
        ];
    }
}
