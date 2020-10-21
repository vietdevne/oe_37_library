@extends('layouts.admin')
@section('title',trans('admin.book.create'))
@section('content')
<h2 class="mt-4 mb-4">@lang('admin.book.create')</h2>
@if ($errors->any())
<div class="alert alert-danger mb-4">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form class="form-horizontal bg-white pt-4 pb-4 pl-2 pr-2" method="POST" action="{{ route('admin.books.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="book_title" class="col-md-4 control-label">@lang('admin.book.title')</label>
        <div class="col-md-12">
            <input id="book_title" type="text" class="form-control{{ $errors->has('cate_name') ? ' is-invalid' : '' }}" name="book_title" value="{{ old('book_title') }}">
            @if ($errors->has('book_title'))
            <span class="help-block">
                <strong>{{ $errors->first('book_title') }}</strong>
            </span>
            @endif
        </div>
    </div>  
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cate_id" class="col-md-4 control-label">@lang('admin.book.category')</label>
                <div class="col-md-12">
                    <select id="cate_id" class="form-control{{ $errors->has('cate_id') ? ' is-invalid' : '' }}" name="cate_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->cate_id }}">{{ $category->cate_name }}</option>
                            @foreach ($category->children as $subCategory)
                                <option value="{{ $subCategory->cate_id }}">― {{ $subCategory->cate_name }}</option>
                            @endforeach
                        @endforeach
                    </select>
                    @if ($errors->has('cate_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('cate_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>  
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="parent_id" class="col-md-4 control-label">@lang('admin.book.author')</label>
                <div class="col-md-12">
                    <select id="parent_id" class="form-control{{ $errors->has('author_id') ? ' is-invalid' : '' }}" name="author_id">
                        @foreach ($authors as $author)
                            <option value="{{ $author->author_id }}">{{ $author->author_name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('author_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('author_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>  
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="pub_id" class="col-md-4 control-label">@lang('admin.book.publisher')</label>
                <div class="col-md-12">
                    <select id="pub_id" class="form-control{{ $errors->has('pub_id') ? ' is-invalid' : '' }}" name="pub_id">
                        @foreach ($publishers as $publisher)
                            <option value="{{ $publisher->pub_id }}">{{ $publisher->pub_name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('pub_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('pub_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>  
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="quantity" class="col-md-4 control-label">@lang('admin.book.quantity')</label>
                <div class="col-md-12">
                    <input id="quantity" name="quantity" type="number" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" value="{{ old('quantity') }}">
                    @if ($errors->has('quantity'))
                    <span class="help-block">
                        <strong>{{ $errors->first('quantity') }}</strong>
                    </span>
                    @endif
                </div>
            </div>  
        </div>
    </div>
    <div class="form-group">
        <label for="book_desc" class="col-md-4 control-label">@lang('admin.category.description')</label>
        <div class="col-md-12">
            <textarea id="book_desc" cols="12" class="form-control{{ $errors->has('book_desc') ? ' is-invalid' : '' }}" name="book_desc">{{ old('book_desc') }}</textarea>
            @if ($errors->has('book_desc'))
            <span class="help-block">
                <strong>{{ $errors->first('book_desc') }}</strong>
            </span>
            @endif
        </div>
    </div>  
    <div class="form-group">
        <label for="book_desc" class="col-md-4 control-label">@lang('admin.book.thumbnail')</label>
        <div class="col-md-12">
            <input type="file" class="form-control{{ $errors->has('book_image') ? ' is-invalid' : '' }}" id="book_image" name="book_image">
            @if ($errors->has('book_image'))
            <span class="help-block">
                <strong>{{ $errors->first('book_image') }}</strong>
            </span>
            @endif    
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <button type="submit" class="btn btn-dark">
                @lang('admin.book.create')
            </button>
        </div>
    </div>  
</form>
@endsection
