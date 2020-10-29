@extends('layouts.app')
@section('title', trans('main.home'))
@section('content')

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="bd-placeholder-img" src="{{ asset('images/banner.jpg') }}" alt="">
            <div class="container">
                <div class="carousel-caption text-left">
                    <h1>@lang('main.welcome').</h1>
                    <p>@lang('main.quote_1')</p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="bd-placeholder-img" src="{{ asset('images/banner.jpg') }}" alt="">
            <div class="container">
                <div class="carousel-caption">
                    <h1>@lang('main.welcome').</h1>
                    <p>@lang('main.quote_2')</p>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="container">
    <h2 class="heading">@lang('main.latest_books')</h2>
    <div class="row">
        @foreach($lastest as $book)
            @include('subviews.book-item', $book)
        @endforeach
    </div>
    <hr class="featurette-divider">

    <h2 class="heading">@lang('main.favorite_books')</h2>
    <div class="row">
        @foreach($favourite as $book)
            @include('subviews.book-item', $book)
        @endforeach
    </div>
    <hr class="featurette-divider">
    <!-- Three columns of text below the carousel -->
    <h2 class="heading">@lang('main.random_publishers')</h2>
    <div class="row author">
        @foreach($publishers as $publisher)
        <div class="col-lg-4">
            @if (!file_exists( public_path().'/images/publishers/'.$publisher->pub_logo) && $publisher->pub_logo == null)
                <img class="img-thumbnail rounded-circle h-50 w-50 mb-4" src="image/library.png" alt="">
            @else
                <img class="img-thumbnail rounded-circle h-50 w-50 mb-4" src="images/publishers/{{ $publisher->pub_logo }}" alt="">
            @endif
            <h2 class="mt-2"><a href="{{ route('publisher.detail', $publisher->pub_id) }}">{{ $publisher->pub_name }}</a></h2>
            <p>{{ str_limit($publisher->pub_desc, 120) }}</p>
        </div><!-- /.col-lg-4 -->
        @endforeach
    </div>
    <hr class="featurette-divider">
</div>
@endsection
