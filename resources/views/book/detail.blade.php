@extends('layouts.app')
@section('title', trans($book->book_title))
@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('main.home')</a></li>
            <li class="breadcrumb-item"><a href="#">{{ $book->category->cate_name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $book->book_title }}</li>
        </ol>
      </nav>
      <div class="row no-gutters">
        <div class="col-md-4">
        @if(file_exists( public_path().'/images/books/'.$book->book_image ))
            <img src="images/books/{{ $book->book_image }}" class="img-thumbnail p-0 mb-4 border-0 rounded-0">
        @else
            <img src="image/library.png" class="img-thumbnail p-0 mb-4 border-0 rounded-0">
        @endif
        </div>
        <div class="col-md-8">
            <div class="card-body pt-0">
                <h1 class="card-title">{{ $book->book_title }}</h1>
                <div class="card-text">
                    <b>@lang('main.book.rating'): </b>
                    <div class="star-ratings d-inline-block">
                        <div class="fill-ratings" style="width: 85%;">
                            <span>★★★★★</span>
                        </div>
                        <div class="empty-ratings">
                            <span>★★★★★</span>
                        </div>
                    </div>
                    <div class="mt-1"><b>@lang('main.book.view'):</b> {{ $book->view }}</div>
                    <div class="mt-1"><b>@lang('main.book.category'):</b> <a href="#">{{ $book->category->cate_name }}</a></div>
                    <div class="mt-1"><b>@lang('main.book.author'):</b> <a href="#">{{ $book->author->author_name }}</a></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6 mb-2">
                        <a href="#" class="btn btn-block btn-outline-dark">
                            <i class="fa fa-hourglass-start" aria-hidden="true"></i> @lang('main.book.borrow_book')
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="btn btn-block btn-outline-dark">
                            <i class="fa fa-thumbs-up" aria-hidden="true"></i> @lang('main.book.like_book')
                        </a>
                    </div>
                </div>
                <p class="card-text pt-3">{!! nl2br(e($book->book_desc)) !!}</p>
            </div>
        </div>
    </div>
    <h3 class="heading mt-4">@lang('main.book.review')</h3>
    <form>
        <div class="form-group">
            <label for="msg">@lang('main.book.review_message')</label>
            <textarea cols="12" class="form-control" id="msg"></textarea>
        </div>
        <div class="form-group">
            <label for="msg">@lang('main.book.review_rating')</label>
            <select class="form-control" id="msg" required>
                <option value="">@lang('main.book.choose_rating')</option>
                @foreach(config('app.rating') as $key => $star)
                <option value=" {{ $key }}">{{ $star }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-dark">@lang('main.book.send_review')</button>
        </div>
    </form>
    <hr class="featurette-divider">
</div>
@endsection
