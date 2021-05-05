@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.assessmentList.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.assessment-lists.update", [$assessmentList->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="faculty_id">{{ trans('cruds.assessmentList.fields.faculty') }}</label>
                    <select class="form-control select2 {{ $errors->has('faculty') ? 'is-invalid' : '' }}" name="faculty_id" id="faculty_id" required>
                        @foreach($faculties as $id => $entry)
                            <option value="{{ $id }}" {{ (old('faculty_id') ? old('faculty_id') : $assessmentList->faculty->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('faculty'))
                        <div class="invalid-feedback">
                            {{ $errors->first('faculty') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assessmentList.fields.faculty_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required">{{ trans('cruds.assessmentList.fields.department') }}</label>
                    <select class="form-control {{ $errors->has('department') ? 'is-invalid' : '' }}" name="department" id="department" required>
                        <option value disabled {{ old('department', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\AssessmentList::DEPARTMENT_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('department', $assessmentList->department) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('department'))
                        <div class="invalid-feedback">
                            {{ $errors->first('department') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assessmentList.fields.department_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="exam_type_id">{{ trans('cruds.assessmentList.fields.exam_type') }}</label>
                    <select class="form-control select2 {{ $errors->has('exam_type') ? 'is-invalid' : '' }}" name="exam_type_id" id="exam_type_id" required>
                        @foreach($exam_types as $id => $entry)
                            <option value="{{ $id }}" {{ (old('exam_type_id') ? old('exam_type_id') : $assessmentList->exam_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('exam_type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('exam_type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assessmentList.fields.exam_type_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.assessmentList.fields.program') }}</label>
                    <select class="form-control {{ $errors->has('program') ? 'is-invalid' : '' }}" name="program" id="program">
                        <option value disabled {{ old('program', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\AssessmentList::PROGRAM_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('program', $assessmentList->program) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('program'))
                        <div class="invalid-feedback">
                            {{ $errors->first('program') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assessmentList.fields.program_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="semester">{{ trans('cruds.assessmentList.fields.semester') }}</label>
                    <input class="form-control {{ $errors->has('semester') ? 'is-invalid' : '' }}" type="text" name="semester" id="semester" value="{{ old('semester', $assessmentList->semester) }}" required>
                    @if($errors->has('semester'))
                        <div class="invalid-feedback">
                            {{ $errors->first('semester') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assessmentList.fields.semester_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="blc_course_title">{{ trans('cruds.assessmentList.fields.blc_course_title') }}</label>
                    <input class="form-control {{ $errors->has('blc_course_title') ? 'is-invalid' : '' }}" type="text" name="blc_course_title" id="blc_course_title" value="{{ old('blc_course_title', $assessmentList->blc_course_title) }}" required>
                    @if($errors->has('blc_course_title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('blc_course_title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assessmentList.fields.blc_course_title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="blc_course_code">{{ trans('cruds.assessmentList.fields.blc_course_code') }}</label>
                    <input class="form-control {{ $errors->has('blc_course_code') ? 'is-invalid' : '' }}" type="text" name="blc_course_code" id="blc_course_code" value="{{ old('blc_course_code', $assessmentList->blc_course_code) }}" required>
                    @if($errors->has('blc_course_code'))
                        <div class="invalid-feedback">
                            {{ $errors->first('blc_course_code') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assessmentList.fields.blc_course_code_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="blc_course_section">{{ trans('cruds.assessmentList.fields.blc_course_section') }}</label>
                    <input class="form-control {{ $errors->has('blc_course_section') ? 'is-invalid' : '' }}" type="text" name="blc_course_section" id="blc_course_section" value="{{ old('blc_course_section', $assessmentList->blc_course_section) }}">
                    @if($errors->has('blc_course_section'))
                        <div class="invalid-feedback">
                            {{ $errors->first('blc_course_section') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assessmentList.fields.blc_course_section_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="blc_course_link">{{ trans('cruds.assessmentList.fields.blc_course_link') }}</label>
                    <input class="form-control {{ $errors->has('blc_course_link') ? 'is-invalid' : '' }}" type="text" name="blc_course_link" id="blc_course_link" value="{{ old('blc_course_link', $assessmentList->blc_course_link) }}" required>
                    @if($errors->has('blc_course_link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('blc_course_link') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assessmentList.fields.blc_course_link_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="blc_assessment_question_link">{{ trans('cruds.assessmentList.fields.blc_assessment_question_link') }}</label>
                    <input class="form-control {{ $errors->has('blc_assessment_question_link') ? 'is-invalid' : '' }}" type="text" name="blc_assessment_question_link" id="blc_assessment_question_link" value="{{ old('blc_assessment_question_link', $assessmentList->blc_assessment_question_link) }}" required>
                    @if($errors->has('blc_assessment_question_link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('blc_assessment_question_link') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assessmentList.fields.blc_assessment_question_link_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="blc_assessment_link">{{ trans('cruds.assessmentList.fields.blc_assessment_link') }}</label>
                    <input class="form-control {{ $errors->has('blc_assessment_link') ? 'is-invalid' : '' }}" type="text" name="blc_assessment_link" id="blc_assessment_link" value="{{ old('blc_assessment_link', $assessmentList->blc_assessment_link) }}" required>
                    @if($errors->has('blc_assessment_link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('blc_assessment_link') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assessmentList.fields.blc_assessment_link_helper') }}</span>
                </div>
              <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>



@endsection
