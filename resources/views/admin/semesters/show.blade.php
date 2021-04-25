@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.semester.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.semesters.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.semester.fields.id') }}
                        </th>
                        <td>
                            {{ $semester->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.semester.fields.title') }}
                        </th>
                        <td>
                            {{ $semester->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.semester.fields.slug') }}
                        </th>
                        <td>
                            {{ $semester->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.semester.fields.is_active') }}
                        </th>
                        <td>
                            {{ App\Models\Semester::IS_ACTIVE_RADIO[$semester->is_active] ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.semesters.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            {{ trans('global.relatedData') }}
        </div>
        <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
            <li class="nav-item">
                <a class="nav-link" href="#semester_assessments" role="tab" data-toggle="tab">
                    {{ trans('cruds.assessment.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="semester_assessments">
                @includeIf('admin.semesters.relationships.semesterAssessments', ['assessments' => $semester->semesterAssessments])
            </div>
        </div>
    </div>



@endsection
