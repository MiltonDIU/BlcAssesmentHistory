<?php

namespace App\Http\Requests;

use App\Models\Assessment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAssessmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('assessment_edit');
    }

    public function rules()
    {
        return [
            'faculty_id' => [
                'required',
                'integer',
            ],
            'department_id' => [
                'required',
                'integer',
            ],
            'program_id' => [
                'required',
                'integer',
            ],
            'semester_id' => [
                'required',
                'integer',
            ],
            'exam_type_id' => [
                'required',
                'integer',
            ],
            'user_id' => [
                'required',
                'integer',
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
