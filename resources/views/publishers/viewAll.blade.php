@extends('layouts.app')
@section('title', trans('main.publishers'))
@section('content')


<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('main.home')</a></li>
            <li class="breadcrumb-item"><a href="{{ route('publishers.showAll') }}">@lang('main.publishers')</a></li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="input-group mb-3">
                <form action="{{ route('publishers.showAll') }}" method="GET" class="form-inline input-group">
                <input name="search" type="text" class="form-control" placeholder="{{ trans('main.publisher.search') }}">
                <div class="input-group-append" id="button-addon4">
                    <button type="submit" class="btn btn-outline-secondary" type="button"><i class="fas fa-search"></i></button>
                </div>
                </form>
            </div>
        </div>
        @foreach($publishers as $publisher)
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-12 text-center">
                        @if(file_exists( public_path().'/images/publishers/'.$publisher->pub_logo || $publisher->pub_logo != null ))
                            <img src="images/publishers/{{ $publisher->pub_logo }}" class="img-thumbnail p-0 border-0 rounded-circle">   
                        @else
                            <img src="images/publishers/pub.png" class="img-thumbnail p-0 border-0 rounded-circle">
                        @endif
                    </div>
                    <div class="col-md-12 text-center">
                        <h5><a href="{{ route('publisher.detail', $publisher->pub_id ) }}">{{ $publisher->pub_name }}</a></h5>
                        <p class="pl-3 pr-3"><i>{{ str_limit($publisher->pub_desc, 120) }}</i></p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


<hr class="featurette-divider">

@endsection
