@extends('layouts.app')
@section('title',trans('auth.login'))
@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-8 offset-md-2">
            <div class="card border-dark mt-4 mb-4">
                <div class="card-header border-dark">@lang('auth.login')</div>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">@lang('auth.username')</label>

                            <div class="col-md-12">
                                <input id="email" type="text" class="form-control" name="email"
                                    value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">@lang('auth.password')</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        @lang('auth.remember')
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-dark">
                                    @lang('auth.login')
                                </button>

                                <a class="btn btn-link text-dark" href="{{ route('password.request') }}">
                                    @lang('auth.forgot')
                                </a>
                            </div>
                        </div>
                        <hr class="featurette-divider mt-4 mb-2">
                        <a href="{{ route('register') }}"
                            class="btn btn-block btn btn-outline-dark mt-4 mb-4">@lang('auth.register')</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="featurette-divider">
@endsection
