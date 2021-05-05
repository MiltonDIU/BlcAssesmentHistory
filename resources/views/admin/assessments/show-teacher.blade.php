@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.assessment.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.assessments.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.assessment.fields.id') }}
                        </th>
                        <td>
                            {{ $assessment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessment.fields.faculty') }}
                        </th>
                        <td>
                            {{ $assessment->faculty->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessment.fields.exam_type') }}
                        </th>
                        <td>
                            {{ $assessment->exam_type->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessment.fields.department') }}
                        </th>
                        <td>
                            {{ App\Models\Assessment::DEPARTMENT_SELECT[$assessment->department] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessment.fields.program') }}
                        </th>
                        <td>
                            {{ App\Models\Assessment::PROGRAM_SELECT[$assessment->program] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessment.fields.erp_course') }}
                        </th>
                        <td>
                            {{ App\Models\Assessment::ERP_COURSE_SELECT[$assessment->erp_course] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessment.fields.semester') }}
                        </th>
                        <td>
                            {{ App\Models\Assessment::SEMESTER_SELECT[$assessment->semester] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessment.fields.user') }}
                        </th>
                        <td>
                            {{ $assessment->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessment.fields.course_code') }}
                        </th>
                        <td>
                            {{ $assessment->course_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessment.fields.course_name') }}
                        </th>
                        <td>
                            {{ $assessment->course_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessment.fields.section_and_section_ids') }}
                        </th>
                        <td>
                            {{ $assessment->section_and_section_ids }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessment.fields.blc_course_link') }}
                        </th>
                        <td>
                            {{ $assessment->blc_course_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessment.fields.assessment_question_link') }}
                        </th>
                        <td>
                            {{ $assessment->assessment_question_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessment.fields.assessment_link') }}
                        </th>
                        <td>
                            {{ $assessment->assessment_link }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.assessments.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
