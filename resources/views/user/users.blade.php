@extends('layouts.admin')
@section('title',trans('admin.users'))
@section('content')
<h2 class="mt-4 mb-4">@lang('admin.users')</h2>

<div class="input-group mb-3">
    <form action="{{ route('admin.users.index') }}" method="GET" class="form-inline input-group">
      <input name="search" type="text" class="form-control" placeholder="{{ trans('admin.search.user') }}">
      <div class="input-group-append" id="button-addon4">
        <button type="submit" class="btn btn-outline-secondary" type="button"><i class="fas fa-search"></i></button>
        <a href="{{ route('admin.users.export') }}" class="btn btn-outline-secondary"><i class="fas fa-file-export"></i></a>
      </div>
    </form>
</div>

@if (session('message'))
    <div class="alert alert-{{ session('message.status') }} mb-4">
        {{ session('message.msg') }}
    </div>
@endif
<div class="table-responsive">
    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('admin.user.username')</th>
                <th scope="col">@lang('admin.user.email')</th>
                <th scope="col">@lang('admin.user.fullname')</th>
                <th scope="col">@lang('admin.user.gender')</th>
                <th scope="col">@lang('admin.user.role')</th>
                <th scope="col">@lang('admin.user.created_at')</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->user_id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->fullname }}</td>
                <td>{{ $user->gender == config('app.gender_male') ? trans('auth.gender_male') : trans('auth.gender_female') }}
                </td>
                <td>{{ $user->role == config('app.admin_role') ? trans('admin.user.admin_role') : trans('admin.user.user_role') }}
                </td>
                <td>{!! $user->created_at->format(trans('admin.date_format')) !!}</td>
                <td>
                    <form action="{{ route('admin.users.destroy',$user->user_id) }}" method="POST" class="form-inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-sm btn-outline-danger mr-1"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        <a href="{{ route('admin.users.edit',$user->user_id) }}">
                            <button type="button" class="btn btn-sm btn-outline-success"><i class="fa fa-pen" aria-hidden="true"></i></button>
                        </a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $users->links() }}
@endsection
