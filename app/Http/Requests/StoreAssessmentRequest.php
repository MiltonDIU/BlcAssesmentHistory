<?php

namespace App\Http\Requests;

use App\Models\Assessment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAssessmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('assessment_create');
    }

    public function rules()
    {
        return [
            'exam_type_id' => [
                'required',
                'integer',
            ],
            'program' => [
                'required',
            ],
            'semester' => [
                'required',
            ],
            'course_code' => [
                'string',
                'required',
            ],
            'course_name' => [
                'string',
                'required',
            ],
            'section_and_section_ids' => [
                'string',
                'required',
            ],
            'blc_course_link' => [
                'string',
                'required',
            ],
            'assessment_question_link' => [
                'string',
                'required',
            ],
            'assessment_link' => [
                'string',
                'required',
            ],
        ];
    }
}
