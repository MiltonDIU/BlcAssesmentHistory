@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.assessment.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.assessments.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="faculty_id">{{ trans('cruds.assessment.fields.faculty') }}</label>
                    <select class="form-control select2 {{ $errors->has('faculty') ? 'is-invalid' : '' }}" name="faculty_id" id="faculty_id" required>

                            @foreach($faculties as $id => $entry)
                                <option value="{{ $entry['id'] }}" {{ old('faculty_id') == $entry['id'] ? 'selected' : '' }}>{{ $entry['facultyName'] }}</option>
                            @endforeach
                    </select>
                    @if($errors->has('faculty'))
                        <div class="invalid-feedback">
                            {{ $errors->first('faculty') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assessment.fields.faculty_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="department_id">{{ trans('cruds.assessment.fields.department') }}</label>
                    <select class="form-control select2 {{ $errors->has('department') ? 'is-invalid' : '' }}" name="department_id" id="department_id" required>
                        @foreach($departments as $key => $value)
                            <option value="{{ $value['id'] }}" {{ (old('department_id') ? old('department_id') : $value['id'] ?? '') == $erpData['departmentId'] ? 'selected' : '' }}>{{ $value['departmentName'] }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('department'))
                        <div class="invalid-feedback">
                            {{ $errors->first('department') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assessment.fields.department_helper') }}</span>
                </div>
{{--                --}}
{{--                <div class="form-group">--}}
{{--                    <label class="required" for="program_id">{{ trans('cruds.assessment.fields.program') }}</label>--}}
{{--                    <select class="form-control select2 {{ $errors->has('program') ? 'is-invalid' : '' }}" name="program_id" id="program_id" required>--}}
{{--                        @foreach($programs as $id => $entry)--}}
{{--                            <option value="{{ $id }}" {{ old('program_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                    @if($errors->has('program'))--}}
{{--                        <div class="invalid-feedback">--}}
{{--                            {{ $errors->first('program') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    <span class="help-block">{{ trans('cruds.assessment.fields.program_helper') }}</span>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label class="required" for="semester_id">{{ trans('cruds.assessment.fields.semester') }}</label>--}}
{{--                    <select class="form-control select2 {{ $errors->has('semester') ? 'is-invalid' : '' }}" name="semester_id" id="semester_id" required>--}}
{{--                        @foreach($semesters as $id => $entry)--}}
{{--                            <option value="{{ $id }}" {{ old('semester_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                    @if($errors->has('semester'))--}}
{{--                        <div class="invalid-feedback">--}}
{{--                            {{ $errors->first('semester') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    <span class="help-block">{{ trans('cruds.assessment.fields.semester_helper') }}</span>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label class="required" for="exam_type_id">{{ trans('cruds.assessment.fields.exam_type') }}</label>--}}
{{--                    <select class="form-control select2 {{ $errors->has('exam_type') ? 'is-invalid' : '' }}" name="exam_type_id" id="exam_type_id" required>--}}
{{--                        @foreach($exam_types as $id => $entry)--}}
{{--                            <option value="{{ $id }}" {{ old('exam_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                    @if($errors->has('exam_type'))--}}
{{--                        <div class="invalid-feedback">--}}
{{--                            {{ $errors->first('exam_type') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    <span class="help-block">{{ trans('cruds.assessment.fields.exam_type_helper') }}</span>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label class="required" for="course_code">{{ trans('cruds.assessment.fields.course_code') }}</label>--}}
{{--                    <input class="form-control {{ $errors->has('course_code') ? 'is-invalid' : '' }}" type="text" name="course_code" id="course_code" value="{{ old('course_code', '') }}" required>--}}
{{--                    @if($errors->has('course_code'))--}}
{{--                        <div class="invalid-feedback">--}}
{{--                            {{ $errors->first('course_code') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    <span class="help-block">{{ trans('cruds.assessment.fields.course_code_helper') }}</span>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label class="required" for="course_name">{{ trans('cruds.assessment.fields.course_name') }}</label>--}}
{{--                    <input class="form-control {{ $errors->has('course_name') ? 'is-invalid' : '' }}" type="text" name="course_name" id="course_name" value="{{ old('course_name', '') }}" required>--}}
{{--                    @if($errors->has('course_name'))--}}
{{--                        <div class="invalid-feedback">--}}
{{--                            {{ $errors->first('course_name') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    <span class="help-block">{{ trans('cruds.assessment.fields.course_name_helper') }}</span>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label class="required" for="section_and_section_ids">{{ trans('cruds.assessment.fields.section_and_section_ids') }}</label>--}}
{{--                    <input class="form-control {{ $errors->has('section_and_section_ids') ? 'is-invalid' : '' }}" type="text" name="section_and_section_ids" id="section_and_section_ids" value="{{ old('section_and_section_ids', '') }}" required>--}}
{{--                    @if($errors->has('section_and_section_ids'))--}}
{{--                        <div class="invalid-feedback">--}}
{{--                            {{ $errors->first('section_and_section_ids') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    <span class="help-block">{{ trans('cruds.assessment.fields.section_and_section_ids_helper') }}</span>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label class="required" for="blc_course_link">{{ trans('cruds.assessment.fields.blc_course_link') }}</label>--}}
{{--                    <input class="form-control {{ $errors->has('blc_course_link') ? 'is-invalid' : '' }}" type="text" name="blc_course_link" id="blc_course_link" value="{{ old('blc_course_link', '') }}" required>--}}
{{--                    @if($errors->has('blc_course_link'))--}}
{{--                        <div class="invalid-feedback">--}}
{{--                            {{ $errors->first('blc_course_link') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    <span class="help-block">{{ trans('cruds.assessment.fields.blc_course_link_helper') }}</span>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label class="required" for="assessment_question_link">{{ trans('cruds.assessment.fields.assessment_question_link') }}</label>--}}
{{--                    <input class="form-control {{ $errors->has('assessment_question_link') ? 'is-invalid' : '' }}" type="text" name="assessment_question_link" id="assessment_question_link" value="{{ old('assessment_question_link', '') }}" required>--}}
{{--                    @if($errors->has('assessment_question_link'))--}}
{{--                        <div class="invalid-feedback">--}}
{{--                            {{ $errors->first('assessment_question_link') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    <span class="help-block">{{ trans('cruds.assessment.fields.assessment_question_link_helper') }}</span>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label class="required" for="assessment_link">{{ trans('cruds.assessment.fields.assessment_link') }}</label>--}}
{{--                    <input class="form-control {{ $errors->has('assessment_link') ? 'is-invalid' : '' }}" type="text" name="assessment_link" id="assessment_link" value="{{ old('assessment_link', '') }}" required>--}}
{{--                    @if($errors->has('assessment_link'))--}}
{{--                        <div class="invalid-feedback">--}}
{{--                            {{ $errors->first('assessment_link') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    <span class="help-block">{{ trans('cruds.assessment.fields.assessment_link_helper') }}</span>--}}
{{--                </div>--}}

                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>



@endsection
