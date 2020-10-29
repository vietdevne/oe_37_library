@extends('layouts.app')
@section('title', Auth::user()->fullname )
@section('content')

<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('main.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ Auth::user()->fullname }}</li>
            <li class="breadcrumb-item">@lang('main.borrow_history')</li>
        </ol>
    </nav>
    <div class="row no-gutters">
        <div class="col-md-12 text-center">
        @if(file_exists( public_path().'/images/users/' . Auth::user()->avatar || Auth::user()->avatar != null ))
            <img src="images/users/{{ Auth::user()->avatar }}" class="img-thumbnail p-0 mb-4 border-0 rounded-circle">   
        @else
            <img src="images/users/user.jpg" class="img-thumbnail p-0 mb-4 border-0 rounded-circle">
        @endif
        </div>
        <div class="col-md-12">
            <div class="card-body pt-0 text-center">
                <h1 class="card-title">{{ Auth::user()->fullname }}</h1>
                <p class="card-text">{!! nl2br(e(Auth::user()->fullname)) !!}</p>
                <div class="row mt-12 text-center justify-content-center">
                    <div class="col-sm-3 mb-2 text-center">
                        <a href="#" class="btn btn-block btn-outline-dark">
                            <i class="fas fa-bell" aria-hidden="true"></i> @lang('main.author.follow_author')
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <hr class="mt-5 mb-5">
    <h3 class="heading mt-4">@lang('main.borrow_history')</h3>
    <div class="row">
        <table class="table table-bordered bg-white">
            <thead>
              <tr>
                <th scope="col">@lang('admin.borrow_table.book_col')</th>
                <th scope="col">@lang('admin.borrow_table.borrow_date')</th>
                <th scope="col">@lang('admin.borrow_table.return_date')</th>
                <th scope="col">@lang('admin.borrow_table.borr_status')</th>
                <th scope="col">@lang('admin.borrow_table.note')</th>
              </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    @if(Auth::user()->user_id == $user->user->user_id)
                    <tr>
                        <td>{{ $user->book->book_title }}</td>
                        <td>{{ date(trans('admin.borrow_date_format'), strtotime($user->borrow_date)) }}</td>
            
                        <td>{{ date(trans('admin.borrow_date_format'), strtotime($user->return_date)) }}</td>
                    @if ($user->borr_status > 0)
                        <td class="text-success">@lang('admin.borrow_table.'.config('app.borr_status.'. $user->borr_status))</td>
                    @else
                        <td class="text-danger">@lang('admin.borrow_table.'.config('app.borr_status.'. $user->borr_status))</td>
                    @endif
                        <td>{{ $user->note }}</td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>
<hr class="featurette-divider">

@endsection
