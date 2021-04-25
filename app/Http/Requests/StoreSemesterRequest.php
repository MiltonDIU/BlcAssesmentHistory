<?php

namespace App\Http\Requests;

use App\Models\Semester;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSemesterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('semester_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
                'unique:semesters',
            ],
            'slug' => [
                'string',
                'required',
                'unique:semesters',
            ],
        ];
    }
}
