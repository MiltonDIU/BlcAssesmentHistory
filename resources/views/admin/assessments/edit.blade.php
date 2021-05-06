@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.assessment.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.assessments.update", [$assessment->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="teacherid" value="{{$assessment->teacherid}}">
                <div class="form-group">
                    <label for="faculty_id">{{ trans('cruds.assessment.fields.faculty') }}</label>
                    <select class="form-control select2 {{ $errors->has('faculty') ? 'is-invalid' : '' }}" name="faculty_id" id="faculty_id">
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
                    <label class="required" for="exam_type_id">{{ trans('cruds.assessment.fields.exam_type') }}</label>
                    <select class="form-control select2 {{ $errors->has('exam_type') ? 'is-invalid' : '' }}" name="exam_type_id" id="exam_type_id" required>
                        @foreach($exam_types as $id => $entry)
                            <option value="{{ $id }}" {{ (old('exam_type_id') ? old('exam_type_id') : $assessment->exam_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('exam_type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('exam_type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assessment.fields.exam_type_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required">{{ trans('cruds.assessment.fields.department') }}</label>
                    <select class="form-control {{ $errors->has('department') ? 'is-invalid' : '' }}" name="department" id="department" required>
                        <option value  {{ old('department', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach($departments as $key => $department)
                            <option value="{{ $department['id'] }}" {{ old('department', $assessment->department) === (string) $department['id'] ? 'selected' : '' }}>{{ $department['departmentName'] }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('department'))
                        <div class="invalid-feedback">
                            {{ $errors->first('department') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assessment.fields.department_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required">{{ trans('cruds.assessment.fields.program') }}</label>
                    <select class="form-control {{ $errors->has('program') ? 'is-invalid' : '' }}" name="program" id="program" required>
                        <option value disabled {{ old('program', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>

                        @foreach($programs as $key => $program)
                            <option value="{{ $program['id'] }}" {{ old('program', $assessment->program) === (string) $program['id'] ? 'selected' : '' }}>{{ $program['programName'] ?? ''}}</option>
                        @endforeach

                    </select>
                    @if($errors->has('program'))
                        <div class="invalid-feedback">
                            {{ $errors->first('program') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assessment.fields.program_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required">{{ trans('cruds.assessment.fields.semester') }}</label>
                    <select class="form-control {{ $errors->has('semester') ? 'is-invalid' : '' }}" name="semester" id="semester" required>
                        <option value disabled {{ old('semester', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach($semesters as $key => $value)
                            <option value="{{ $value['id'] }}" {{ old('semester', $assessment->semester) === (string) $value['id'] ? 'selected' : '' }}>{{ $value['semesterName'].'-'.$value['semesterYear'] }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('semester'))
                        <div class="invalid-feedback">
                            {{ $errors->first('semester') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assessment.fields.semester_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.assessment.fields.erp_course') }}</label>
                    <select class="form-control {{ $errors->has('erp_course') ? 'is-invalid' : '' }}" name="erp_course" id="erp_course">
                        <option value disabled {{ old('erp_course', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>

                    </select>
                    <span>if didn't show course then change the semester and select your assessment semester again.</span>
                    @if($errors->has('erp_course'))
                        <div class="invalid-feedback">
                            {{ $errors->first('erp_course') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assessment.fields.erp_course_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="course_code">{{ trans('cruds.assessment.fields.course_code') }}</label>
                    <input class="form-control {{ $errors->has('course_code') ? 'is-invalid' : '' }}" type="text" name="course_code" id="course_code" value="{{ old('course_code', $assessment->course_code) }}" required>
                    @if($errors->has('course_code'))
                        <div class="invalid-feedback">
                            {{ $errors->first('course_code') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assessment.fields.course_code_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="course_name">{{ trans('cruds.assessment.fields.course_name') }}</label>
                    <input class="form-control {{ $errors->has('course_name') ? 'is-invalid' : '' }}" type="text" name="course_name" id="course_name" value="{{ old('course_name', $assessment->course_name) }}" required>
                    @if($errors->has('course_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('course_name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assessment.fields.course_name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="section_and_section_ids">{{ trans('cruds.assessment.fields.section_and_section_ids') }}</label>
                    <input class="form-control {{ $errors->has('section_and_section_ids') ? 'is-invalid' : '' }}" type="text" name="section_and_section_ids" id="section_and_section_ids" value="{{ old('section_and_section_ids', $assessment->section_and_section_ids) }}" required>
                    @if($errors->has('section_and_section_ids'))
                        <div class="invalid-feedback">
                            {{ $errors->first('section_and_section_ids') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assessment.fields.section_and_section_ids_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="blc_course_link">{{ trans('cruds.assessment.fields.blc_course_link') }}</label>
                    <input class="form-control {{ $errors->has('blc_course_link') ? 'is-invalid' : '' }}" type="text" name="blc_course_link" id="blc_course_link" value="{{ old('blc_course_link', $assessment->blc_course_link) }}" required>
                    @if($errors->has('blc_course_link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('blc_course_link') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assessment.fields.blc_course_link_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="assessment_question_link">{{ trans('cruds.assessment.fields.assessment_question_link') }}</label>
                    <input class="form-control {{ $errors->has('assessment_question_link') ? 'is-invalid' : '' }}" type="text" name="assessment_question_link" id="assessment_question_link" value="{{ old('assessment_question_link', $assessment->assessment_question_link) }}" required>
                    @if($errors->has('assessment_question_link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('assessment_question_link') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assessment.fields.assessment_question_link_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="assessment_link">{{ trans('cruds.assessment.fields.assessment_link') }}</label>
                    <input class="form-control {{ $errors->has('assessment_link') ? 'is-invalid' : '' }}" type="text" name="assessment_link" id="assessment_link" value="{{ old('assessment_link', $assessment->assessment_link) }}" required>
                    @if($errors->has('assessment_link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('assessment_link') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assessment.fields.assessment_link_helper') }}</span>
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


@section('scripts')
    @parent
    <script type="text/javascript">

        $("select[name='semester']").change(function(){

            var semester = $(this).val();

            var token = $("input[name='_token']").val();
            var teacherid = $("input[name='teacherid']").val();

            $.ajax({

                url: "<?php echo route('admin.assessments.erp_course_list') ?>",

                method: 'POST',

                data: {semester:semester,teacherid:teacherid, _token:token},

                success: function(data) {
                    console.log(data);
                    $("select[name='erp_course']").html('');
                    //
                    $("select[name='erp_course']").html(data.options);

                }

            });

        });

    </script>
@endsection
