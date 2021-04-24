<?php

namespace App\Http\Requests;

use App\Models\Department;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDepartmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('department_edit');
    }

    public function rules()
    {
        return [
            'faculty_id' => [
                'required',
                'integer',
            ],
            'title' => [
                'string',
                'required',
            ],
            'short_name' => [
                'string',
                'required',
            ],
            'slug' => [
                'string',
                'required',
                'unique:departments,slug,' . request()->route('department')->id,
            ],
            'is_active' => [
                'string',
                'required',
            ],
        ];
    }
}
