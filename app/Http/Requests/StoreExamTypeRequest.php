<?php

namespace App\Http\Requests;

use App\Models\ExamType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreExamTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('exam_type_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
                'unique:exam_types',
            ],
            'slug' => [
                'string',
                'required',
                'unique:exam_types',
            ],
            'is_active' => [
                'required',
            ],
        ];
    }
}
