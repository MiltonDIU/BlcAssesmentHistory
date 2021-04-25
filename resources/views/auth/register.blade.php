@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="required col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="required col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="required col-md-4 col-form-label text-md-right"  for="mobile">{{ trans('cruds.profile.fields.employee_id') }}</label>
                            <div class="col-md-6">
                            <input class="form-control {{ $errors->has('employee') ? 'is-invalid' : '' }}" type="text" name="employee" id="employee" required>
                            @if($errors->has('employee'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('employee') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.profile.fields.employee_id_helper') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="required col-md-4 col-form-label text-md-right"  for="mobile">{{ trans('cruds.profile.fields.designation') }}</label>
                            <div class="col-md-6">
                            <input class="form-control {{ $errors->has('designation') ? 'is-invalid' : '' }}" type="text" name="designation" id="designation" required>
                            @if($errors->has('designation'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('designation') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.profile.fields.designation_helper') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="required col-md-4 col-form-label text-md-right">{{ trans('cruds.profile.fields.employee_type') }}</label>
                            <div class="col-md-6">
                            @foreach(App\Models\Profile::PROFILE_TYPE as $key => $label)
                                <div class="form-check {{ $errors->has('employee_type') ? 'is-invalid' : '' }}">
                                    <input class="form-check-input" type="radio" id="employee_type_{{ $key }}" name="employee_type" value="{{ $key }}" required>
                                    <label class="form-check-label" for="employee_type_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('employee_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('employee_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.program.fields.is_active_helper') }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="required col-md-4 col-form-label text-md-right"  for="mobile">{{ trans('cruds.profile.fields.mobile') }}</label>
                            <div class="col-md-6">
                            <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" required >
                            @if($errors->has('mobile'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mobile') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.profile.fields.mobile_helper') }}</span>
                            </div>
                        </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="required col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="required col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
