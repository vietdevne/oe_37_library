@extends('layouts.admin')
@section('title', trans('admin.home'))
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-4 mb-4">
    <h2>@lang('admin.chart.users')</h2>
</div>
<canvas class="my-4 w-100 h-75" id="userChart"></canvas>
@endsection
