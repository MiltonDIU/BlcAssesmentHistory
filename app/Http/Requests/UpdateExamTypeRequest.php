<?php

namespace App\Http\Requests;

use App\Models\ExamType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateExamTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('exam_type_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
                'unique:exam_types,title,' . request()->route('exam_type')->id,
            ],
            'slug' => [
                'string',
                'required',
                'unique:exam_types,slug,' . request()->route('exam_type')->id,
            ],
            'is_active' => [
                'required',
            ],
        ];
    }
}
