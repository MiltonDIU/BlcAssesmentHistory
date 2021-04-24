@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.faculty.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.faculties.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.faculty.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.faculty.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="short_name">{{ trans('cruds.faculty.fields.short_name') }}</label>
                    <input class="form-control {{ $errors->has('short_name') ? 'is-invalid' : '' }}" type="text" name="short_name" id="short_name" value="{{ old('short_name', '') }}" required>
                    @if($errors->has('short_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('short_name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.faculty.fields.short_name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="slug">{{ trans('cruds.faculty.fields.slug') }}</label>
                    <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', '') }}" required>
                    @if($errors->has('slug'))
                        <div class="invalid-feedback">
                            {{ $errors->first('slug') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.faculty.fields.slug_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.faculty.fields.is_active') }}</label>
                    @foreach(App\Models\Faculty::IS_ACTIVE_RADIO as $key => $label)
                        <div class="form-check {{ $errors->has('is_active') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="is_active_{{ $key }}" name="is_active" value="{{ $key }}" {{ old('is_active', '1') === (string) $key ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                    @if($errors->has('is_active'))
                        <div class="invalid-feedback">
                            {{ $errors->first('is_active') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.faculty.fields.is_active_helper') }}</span>
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
