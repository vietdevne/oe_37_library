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
    <div class="row no-gutters">
        <div class="col-md-12 text-center">
        @if(file_exists( public_path().'/images/authors/'.$author->author_image || $author->author_image != null ))
            <img src="images/authors/{{ $author->author_image }}" class="img-thumbnail p-0 mb-4 border-0 rounded-circle">   
        @else
            <img src="images/authors/author.png" class="img-thumbnail p-0 mb-4 border-0 rounded-circle">
        @endif
        </div>
        <div class="col-md-12">
            <div class="card-body pt-0 text-center">
                <h1 class="card-title">{{ $author->author_name }}</h1>
                <p class="card-text">{!! nl2br(e($author->author_desc)) !!}</p>
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
    <h3 class="heading mt-4">@lang('main.author.books') {{ $author->author_name }}</h3>
    <div class="row">
        @foreach ($books as $book)
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        @if(file_exists( public_path().'/images/books/'.$book->book_image || $book->book_image != null ))
                            <img src="images/books/{{ $book->book_image }}" class="img-thumbnail p-0 border-0 rounded-0">
                        @else
                            <img src="image/library.png" class="img-thumbnail p-0 border-0 rounded-0">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->book_title }}</h5>
                            <p class="card-text">{{ str_limit($book->book_desc, 120) }}</p>
                            <div class="card-text">
                                <div class="star-ratings d-inline-block">
                                    <div class="fill-ratings" style="width: 85%;">
                                        <span>★★★★★</span>
                                    </div>
                                    <div class="empty-ratings">
                                        <span>★★★★★</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 prod-price mb-2">
                                    <a href="{{ route('book.detail', $book->book_id) }}" class="btn btn-block btn-outline-dark">
                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i> @lang('main.book.like_book')
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('book.detail', $book->book_id) }}" class="btn btn-block btn-outline-dark">
                                        <i class="fa fa-eye" aria-hidden="true"></i> @lang('main.book.view_book')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @endforeach
    </div>
</div>
<hr class="featurette-divider">

@endsection
