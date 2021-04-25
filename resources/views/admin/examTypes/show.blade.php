@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.examType.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.exam-types.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.examType.fields.id') }}
                        </th>
                        <td>
                            {{ $examType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examType.fields.title') }}
                        </th>
                        <td>
                            {{ $examType->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examType.fields.slug') }}
                        </th>
                        <td>
                            {{ $examType->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.examType.fields.is_active') }}
                        </th>
                        <td>
                            {{ App\Models\ExamType::IS_ACTIVE_RADIO[$examType->is_active] ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.exam-types.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
