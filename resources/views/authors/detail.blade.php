@extends('layouts.app')
@section('title', trans($author->author_name))
@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('main.home')</a></li>
            <li class="breadcrumb-item"><a href="{{ route('authors.showAll') }}">@lang('main.authors')</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $author->author_name }}</li>
        </ol>
    </nav>
    <div class="text-center">
        @if (file_exists( public_path().'/images/authors/'.$author->author_image && $author->author_image != null ))
            <img src="images/authors/{{ $author->author_image }}" class="img-thumbnail rounded-circle h-25 w-25 mb-4">   
        @else
            <img class="img-thumbnail rounded-circle h-25 w-25" src="image/default_avatar.jpg" alt="">
        @endif
        <h1 class="mt-4">{{ $author->author_name }}</h1>
        <p class="text-muted">{!! nl2br(e($author->author_desc)) !!}</p>
        <div class="">
            @if (Auth::check())
            <form action="{{ route('author.follow') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="author_id" value="{{ $author->author_id }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">
                <button class="btn btn-outline-dark">
                    @if(!$followed)
                        <i class="fas fa-bell" aria-hidden="true"></i> @lang('main.author.follow_author')
                    @else
                        <i class="fas fa-bell-slash" aria-hidden="true"></i> @lang('main.author.unfollow_author')
                    @endif
                </button>
            </form>
            @else 
                <button class="btn btn-outline-dark"><i class="fas fa-bell" aria-hidden="true"></i> @lang('auth.login')</button>
            @endif
        </div>
    </div> 
    @if(count($books) > 0)
    <hr class="mt-5 mb-5">
    <h3 class="heading mt-4">@lang('main.author.books') {{ $author->author_name }}</h3>
    <div class="row">
        @foreach ($books as $book)
            @include('subviews.book-item', $book)
        @endforeach
    </div>
    @endif
</div>
<hr class="featurette-divider">

@endsection
