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



@endsection
