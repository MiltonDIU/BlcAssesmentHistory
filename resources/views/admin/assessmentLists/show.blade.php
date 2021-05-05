@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.assessmentList.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.assessment-lists.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.assessmentList.fields.id') }}
                        </th>
                        <td>
                            {{ $assessmentList->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessmentList.fields.faculty') }}
                        </th>
                        <td>
                            {{ $assessmentList->faculty->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessmentList.fields.department') }}
                        </th>
                        <td>
                            {{ App\Models\AssessmentList::DEPARTMENT_SELECT[$assessmentList->department] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessmentList.fields.exam_type') }}
                        </th>
                        <td>
                            {{ $assessmentList->exam_type->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessmentList.fields.program') }}
                        </th>
                        <td>
                            {{ App\Models\AssessmentList::PROGRAM_SELECT[$assessmentList->program] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessmentList.fields.semester') }}
                        </th>
                        <td>
                            {{ $assessmentList->semester }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessmentList.fields.blc_course_title') }}
                        </th>
                        <td>
                            {{ $assessmentList->blc_course_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessmentList.fields.blc_course_code') }}
                        </th>
                        <td>
                            {{ $assessmentList->blc_course_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessmentList.fields.blc_course_section') }}
                        </th>
                        <td>
                            {{ $assessmentList->blc_course_section }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessmentList.fields.blc_course_link') }}
                        </th>
                        <td>
                            {{ $assessmentList->blc_course_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessmentList.fields.blc_assessment_question_link') }}
                        </th>
                        <td>
                            {{ $assessmentList->blc_assessment_question_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessmentList.fields.blc_assessment_link') }}
                        </th>
                        <td>
                            {{ $assessmentList->blc_assessment_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessmentList.fields.erp_data') }}
                        </th>
                        <td>
                            {{ $assessmentList->erp_data }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessmentList.fields.user') }}
                        </th>
                        <td>
                            {{ $assessmentList->user->name ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.assessment-lists.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
