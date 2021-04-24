<?php

namespace App\Http\Requests;

use App\Models\Department;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDepartmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('department_create');
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
                'unique:departments',
            ],
            'is_active' => [
                'string',
                'required',
            ],
        ];
    }
}
