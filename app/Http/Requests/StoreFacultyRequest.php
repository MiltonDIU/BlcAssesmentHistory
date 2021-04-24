<?php

namespace App\Http\Requests;

use App\Models\Faculty;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFacultyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('faculty_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
                'unique:faculties',
            ],
            'short_name' => [
                'string',
                'required',
                'unique:faculties',
            ],
            'slug' => [
                'string',
                'required',
                'unique:faculties',
            ],
        ];
    }
}
