@extends('layouts.admin')
@section('title', trans('admin.home'))
@section('content')
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-4 mb-4">
            <h2>@lang('admin.chart.users')</h2>
        </div>
        <canvas class="my-4 w-100 h-75" id="userChart"></canvas>
    </div>
    <div class="row">
        <div class=" col-md-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-4 mb-4">
            <h2>@lang('admin.chart.bookMonth')</h2>
        </div>
        <div class="col-md-6">
            {!! $monthChart->container() !!}
        </div>
        <div class="col-md-6">
            {!! $quarterChart->container() !!}
        </div>
        <div class=" col-md-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-4 mb-4">
            <h2>@lang('admin.chart.bookYear')</h2>
        </div>
        <div class="col-md-12">
            {!! $yearChart->container() !!}
        </div>
    </div>
    {!! $monthChart->script() !!} 
    {!! $quarterChart->script() !!} 
    {!! $yearChart->script() !!} 
@endsection
