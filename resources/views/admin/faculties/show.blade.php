@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.faculty.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.faculties.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.faculty.fields.id') }}
                        </th>
                        <td>
                            {{ $faculty->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.faculty.fields.title') }}
                        </th>
                        <td>
                            {{ $faculty->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.faculty.fields.short_name') }}
                        </th>
                        <td>
                            {{ $faculty->short_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.faculty.fields.slug') }}
                        </th>
                        <td>
                            {{ $faculty->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.faculty.fields.is_active') }}
                        </th>
                        <td>
                            {{ App\Models\Faculty::IS_ACTIVE_RADIO[$faculty->is_active] ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.faculties.index') }}">
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
                <a class="nav-link" href="#faculty_departments" role="tab" data-toggle="tab">
                    {{ trans('cruds.department.title') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#faculty_assessments" role="tab" data-toggle="tab">
                    {{ trans('cruds.assessment.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="faculty_departments">
                @includeIf('admin.faculties.relationships.facultyDepartments', ['departments' => $faculty->facultyDepartments])
            </div>
            <div class="tab-pane" role="tabpanel" id="faculty_assessments">
                @includeIf('admin.faculties.relationships.facultyAssessments', ['assessments' => $faculty->facultyAssessments])
            </div>
        </div>
    </div>

@endsection
