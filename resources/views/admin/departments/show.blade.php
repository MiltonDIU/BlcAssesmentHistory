@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.department.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.departments.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.department.fields.id') }}
                        </th>
                        <td>
                            {{ $department->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.department.fields.faculty') }}
                        </th>
                        <td>
                            {{ $department->faculty->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.department.fields.title') }}
                        </th>
                        <td>
                            {{ $department->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.department.fields.short_name') }}
                        </th>
                        <td>
                            {{ $department->short_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.department.fields.slug') }}
                        </th>
                        <td>
                            {{ $department->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.department.fields.about') }}
                        </th>
                        <td>
                            {!! $department->about !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.department.fields.is_active') }}
                        </th>
                        <td>
                            {{ App\Models\Department::IS_ACTIVE_RADIO[$department->is_active] ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.departments.index') }}">
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
                <a class="nav-link" href="#department_programs" role="tab" data-toggle="tab">
                    {{ trans('cruds.program.title') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#department_assessments" role="tab" data-toggle="tab">
                    {{ trans('cruds.assessment.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="department_programs">
                @includeIf('admin.departments.relationships.departmentPrograms', ['programs' => $department->departmentPrograms])
            </div>
            <div class="tab-pane" role="tabpanel" id="department_assessments">
                @includeIf('admin.departments.relationships.departmentAssessments', ['assessments' => $department->departmentAssessments])
            </div>
        </div>
    </div>



@endsection
