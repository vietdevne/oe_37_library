@extends('layouts.app')
@section('title', trans($publisher->pub_name))
@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('main.home')</a></li>
            <li class="breadcrumb-item"><a href="{{ route('publishers.showAll') }}">@lang('main.publishers')</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $publisher->pub_name }}</li>
        </ol>
    </nav>
    <div class="text-center">
        @if (file_exists( public_path().'/images/publishers/'.$publisher->pub_logo && $publisher->pub_logo != null ))
            <img src="images/publishers/{{ $publisher->pub_logo }}" class="img-thumbnail rounded-circle h-25 w-25 mb-4">   
        @else
            <img class="img-thumbnail rounded-circle h-25 w-25" src="image/library.png" alt="">
        @endif
        <h1 class="mt-4">{{ $publisher->pub_name }}</h1>
        <p class="text-muted">{!! nl2br(e($publisher->pub_desc)) !!}</p>
    </div>
    @if(count($books) > 0)
    <hr class="mt-5 mb-5">
    <h3 class="heading mt-4">@lang('main.publisher.books') {{ $publisher->pub_name }}</h3>
    <div class="row">
        @foreach ($books as $book)
            @include('subviews.book-item', $book)
        @endforeach
    </div>
    @endif
</div>
<hr class="featurette-divider">

@endsection
