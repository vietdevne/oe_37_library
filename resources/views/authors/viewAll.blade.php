@extends('layouts.app')
@section('title', trans('main.authors'))
@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('main.home')</a></li>
            <li class="breadcrumb-item"><a href="{{ route('authors.showAll') }}">@lang('main.authors')</a></li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="input-group mb-3">
                <form action="{{ route('authors.showAll') }}" method="GET" class="form-inline input-group">
                    <input name="search" type="text" class="form-control"
                        placeholder="{{ trans('main.author.search') }}">
                    <div class="input-group-append" id="button-addon4">
                        <button type="submit" class="btn btn-outline-secondary" type="button"><i
                                class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        @foreach($authors as $author)
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body text-center pb-0">
                    @if (file_exists(public_path().'/images/authors/'.$author->author_image && $author->author_image != null))
                    <img src="images/authors/{{ $author->author_image }}"
                        class="img-thumbnail rounded-circle h-50 w-50 mb-4">
                    @else
                    <img src="image/default_avatar.jpg" class="img-thumbnail rounded-circle h-50 w-50 mb-4">
                    @endif
                    <h5>
                        <a href="{{ route('authors.detail', $author->author_id ) }}">{{ $author->author_name }}</a>
                    </h5>
                    <p class="pl-3 pr-3"><i>{{ str_limit($author->author_desc, 120) }}</i></p>
                </div>
                <div class="row p-4 justify-content-center">
                    <div class="col-md-6 text-center ">
                        <a href="{{ route('authors.detail', $author->author_id ) }}"
                            class="btn btn-block btn-outline-dark">
                            <i class="fa fa-eye" aria-hidden="true"></i> @lang('main.book.view_book')</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<hr class="featurette-divider">
@endsection
