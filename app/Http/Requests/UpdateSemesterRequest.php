<?php

namespace App\Http\Requests;

use App\Models\Semester;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSemesterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('semester_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
                'unique:semesters,title,' . request()->route('semester')->id,
            ],
            'slug' => [
                'string',
                'required',
                'unique:semesters,slug,' . request()->route('semester')->id,
            ],
        ];
    }
}
