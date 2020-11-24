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
    <h3 class="heading mt-5">@lang('main.borrow_history')</h3>
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
