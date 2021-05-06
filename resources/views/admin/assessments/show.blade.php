@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.assessment.title') }}
        </div>
        @php
            $as = new \App\Http\Controllers\Admin\AssessmentController();
        @endphp
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
                            {{ trans('cruds.assessment.fields.faculty') }}
                        </th>
                        <td>
                            @foreach($as->facultyList()  as $faculty)
                                @if($faculty['id']==$assessment->faculty_id)
                                    {{$faculty['facultyName']}}
                                @endif
                            @endforeach
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

                            @foreach($as->departmentList()  as $department)
                                @if($department['id']==$assessment->department)
                                    {{$department['departmentName']}}
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessment.fields.program') }}
                        </th>
                        <td>
                            {{ $assessment->program ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assessment.fields.semester') }}
                        </th>
                        <td>
                            @foreach($as->semesterList()  as $semester)
                                @if($semester['id']==$assessment->semester)
                                    {{$semester['semesterName']}}-{{$semester['semesterYear']}}
                                @endif
                            @endforeach
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
                    <tr>
                        <th>
                           ERP Course Information
                        </th>
                        <td>
                            <table>
                                <tr>
                                    <th>Code</th>
                                    <th>Title</th>
                                    <th>Section Id</th>
                                    <th>Section</th>
                                    <th>Department Id</th>
                                    <th>Department Name</th>
                                    <th>Course Type</th>
                                    <th>Number of Student</th>
                                    <th>Credit</th>
                                </tr>
                                <tr>

                            @foreach(explode("_",$assessment->erp_course) as $course)
                                <td>{{$course}}</td>
                            @endforeach

                                </tr>
                            </table>
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
