<?php

namespace App\Http\Requests;

use App\Models\Faculty;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFacultyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('faculty_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
                'unique:faculties,title,' . request()->route('faculty')->id,
            ],
            'short_name' => [
                'string',
                'required',
                'unique:faculties,short_name,' . request()->route('faculty')->id,
            ],
            'slug' => [
                'string',
                'required',
                'unique:faculties,slug,' . request()->route('faculty')->id,
            ],
        ];
    }
}
