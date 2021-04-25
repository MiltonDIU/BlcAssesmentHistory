<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\ExamType;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyExamTypeRequest extends FormRequest  {





    public function authorize()
    {
        abort_if(Gate::denies('exam_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




        return true;

    }
    public function rules()
    {




        return [
            'ids' => 'required|array',
            'ids.*' => 'exists:exam_types,id',
        ];

}

}
