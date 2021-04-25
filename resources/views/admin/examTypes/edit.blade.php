@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.examType.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.exam-types.update", [$examType->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.examType.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $examType->title) }}" required>
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.examType.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="slug">{{ trans('cruds.examType.fields.slug') }}</label>
                    <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', $examType->slug) }}" required>
                    @if($errors->has('slug'))
                        <div class="invalid-feedback">
                            {{ $errors->first('slug') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.examType.fields.slug_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required">{{ trans('cruds.examType.fields.is_active') }}</label>
                    @foreach(App\Models\ExamType::IS_ACTIVE_RADIO as $key => $label)
                        <div class="form-check {{ $errors->has('is_active') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="is_active_{{ $key }}" name="is_active" value="{{ $key }}" {{ old('is_active', $examType->is_active) === (string) $key ? 'checked' : '' }} required>
                            <label class="form-check-label" for="is_active_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                    @if($errors->has('is_active'))
                        <div class="invalid-feedback">
                            {{ $errors->first('is_active') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.examType.fields.is_active_helper') }}</span>
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
