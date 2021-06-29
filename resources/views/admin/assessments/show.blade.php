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
                <div class="table-responsive">
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
                                @foreach($as->programList()  as $program)
                                    @if($program['id']==$assessment->program)
                                        {{$program['programName']}}
                                    @endif
                                @endforeach
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
                                Teacher Name
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
                                <a href="{{ $assessment->blc_course_link }}" target="_blank">{{ $assessment->blc_course_link }}</a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.assessment.fields.assessment_question_link') }}
                            </th>
                            <td>
                               <a href="{{ $assessment->assessment_question_link }}" target="_blank"> {{ $assessment->assessment_question_link }}</a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.assessment.fields.assessment_link') }}
                            </th>
                            <td>
                                <a href="{{ $assessment->assessment_link }}" target="_blank">{{ $assessment->assessment_link }}</a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                ERP Course Information
                            </th>
                            <td class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Code</th>
                                        <th>Title</th>
                                        <th>Section Id</th>
                                        <th>Section</th>
                                        <th>Department Id</th>
                                        <th>Department Name</th>
                                        <th>Program ID </th>
                                        <th>Program Name</th>
                                        <th>Faculty Id</th>
                                        <th>Faculty Name</th>
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
                </div>
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable datatable-Assessment">
                        <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.assessment.fields.exam_type') }}
                            </th>

                            <th>
                                ERP Course Name
                            </th>
                            <th>
                                {{ trans('cruds.assessment.fields.department') }}
                            </th>
                            <th>
                                {{ trans('cruds.assessment.fields.semester') }}
                            </th>
                            <th>
                                {{ trans('cruds.assessment.fields.course_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.assessment.fields.blc_course_link') }}
                            </th>
                            <th>
                                {{ trans('cruds.assessment.fields.assessment_question_link') }}
                            </th>
                            <th>
                                {{ trans('cruds.assessment.fields.assessment_link') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                        </thead>
                        <tbody>


                            @foreach($assessments as $key => $assessment)

                                    {{--                            @if((\App\Models\Assessment::checkExamDone($assessment->teacherid,$assessment->program,$assessment->department,$assessment->semester,$assessment->course_code)!=true))--}}
                                    <tr data-entry-id="{{ $assessment->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $assessment->exam_type->title ?? '' }}
                                        </td>
                                        <td>
                                            @php
                                                $erp_course = explode("_", $assessment->erp_course);
                                            @endphp
                                            {{ $erp_course[1] ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($departments  as $department)
                                                @if($department['id']==$assessment->department)
                                                    {{$department['departmentName']}}
                                                @endif
                                            @endforeach
                                        </td>

                                        <td>
                                            @foreach($semesters  as $semester)
                                                @if($semester['id']==$assessment->semester)
                                                    {{$semester['semesterName']}}-{{$semester['semesterYear']}}
                                                @endif
                                            @endforeach

                                        </td>
                                        <td>
                                            {{ $assessment->course_code ?? '' }}
                                        </td>
                                        <td>
                                            <a href="{{ $assessment->blc_course_link ?? '' }}" target="_blank">
                                                {{ Illuminate\Support\Str::limit($assessment->blc_course_link, 15) }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ $assessment->assessment_question_link ?? '' }}" target="_blank">
                                                {{ Illuminate\Support\Str::limit($assessment->assessment_question_link, 15) }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ $assessment->assessment_link ?? '' }}" target="_blank">
                                                {{ Illuminate\Support\Str::limit($assessment->assessment_link, 15) }}
                                            </a>
                                        </td>
                                        <td>


                                            @can('assessment_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.assessments.show', encrypt($assessment->id)) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('assessment_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.assessments.edit', $assessment->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('assessment_delete')
                                                <form action="{{ route('admin.assessments.destroy', $assessment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                    {{--                            @endif--}}

                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.assessments.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>


    </div>



@endsection
