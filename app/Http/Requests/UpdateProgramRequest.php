<?php

namespace App\Http\Requests;

use App\Models\Program;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProgramRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('program_edit');
    }

    public function rules()
    {
        return [
            'department_id' => [
                'required',
                'integer',
            ],
            'title' => [
                'string',
                'required',
            ],
            'short_name' => [
                'string',
                'nullable',
            ],
            'slug' => [
                'string',
                'required',
                'unique:programs,slug,' . request()->route('program')->id,
            ],
            'is_active' => [
                'required',
            ],
        ];
    }
}
