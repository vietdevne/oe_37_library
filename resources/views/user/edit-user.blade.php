@extends('layouts.admin')
@section('title',trans('admin.edit_user'))
@section('content')
<h2 class="mt-4 mb-4">@lang('admin.edit_user') {{ $getUser->username }}</h2>
@if ($errors->any())
<div class="alert alert-danger mb-4">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form class="form-horizontal bg-white pt-4 pb-4 pl-2 pr-2" method="POST"
    action="{{ route('admin.users.update', $getUser->user_id) }}">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
        <label for="fullname" class="col-md-4 control-label">@lang('admin.user.fullname')</label>
        <div class="col-md-12">
            <input id="fullname" type="text" class="form-control" name="fullname" value="{{ $getUser->fullname }}"
                required autofocus>
            @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
        <label for="birthday" class="col-md-4 control-label">@lang('admin.user.birthday')</label>

        <div class="col-md-12">
            <input id="birthday" type="date" class="form-control" name="birthday" value="{{ $getUser->birthday }}">
            @if ($errors->has('birthday'))
            <span class="help-block">
                <strong>{{ $errors->first('birthday') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <label for="phone" class="col-md-4 control-label">@lang('admin.user.phone')</label>
        <div class="col-md-12">
            <input id="phone" type="tel" class="form-control" name="phone" value="{{ $getUser->phone }}">
            @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">@lang('admin.user.email')</label>
        <div class="col-md-12">
            <input id="email" type="email" class="form-control" name="email" value="{{ $getUser->email }}" required>
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
        <label for="role" class="col-md-4 control-label">@lang('admin.user.role')</label>
        <div class="col-md-12">
            <select id="role" class="form-control" name="role" required autofocus>
                <option value="">---</option>
                <option value="{{ config('app.admin_role') }}"
                    {{ $getUser->role == config('app.admin_role') ? "selected" : "" }}>
                    @lang('admin.user.admin_role')</option>
                <option value="{{ config('app.user_role') }}"
                    {{ $getUser->role == config('app.user_role') ? "selected" : "" }}>
                    @lang('admin.user.user_role')</option>
            </select>
            @if ($errors->has('role'))
            <span class="help-block">
                <strong>{{ $errors->first('role') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
        <label for="gender" class="col-md-4 control-label">@lang('admin.user.gender')</label>
        <div class="col-md-12">
            <select id="gender" class="form-control" name="gender" required autofocus>
                <option value="">---</option>
                <option value="{{ config('app.gender_female') }}"
                    {{ $getUser->gender == config('app.gender_female') ? "selected" : "" }}>
                    @lang('auth.gender_female')</option>
                <option value="{{ config('app.gender_male') }}"
                    {{ $getUser->gender == config('app.gender_male') ? "selected" : "" }}>
                    @lang('auth.gender_male')</option>
            </select>
            @if ($errors->has('gender'))
            <span class="help-block">
                <strong>{{ $errors->first('gender') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12">
            <button type="submit" class="btn btn-dark">
                @lang('admin.edit_user')
            </button>
        </div>
    </div>
</form>
@endsection
