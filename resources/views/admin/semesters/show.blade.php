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



@endsection
