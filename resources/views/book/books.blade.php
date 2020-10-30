@extends('layouts.admin')
@section('title',trans('admin.books'))
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-4 mb-4">
    <h2>@lang('admin.books')</h2>
    <div><a href="{{ route('admin.books.create') }}"><button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>
            @lang('admin.book.create')</button></a></div>
</div>

<div class="input-group mb-3">
    <form action="{{ route('admin.books.index') }}" method="GET" class="form-inline input-group">
      <input name="searchName" type="text" class="form-control" placeholder="{{ trans('admin.search.book') }}">
      <div class="input-group-append" id="button-addon4">
        <select class="form-control" name="searchCategory">
            <option value="">@lang('admin.book.category')</option>
            @foreach($categories as $category)
                <option value="{{ $category->cate_id }}">{{ $category->cate_name }}</option>
                @foreach ($category->children as $subCategory)
                    <option value="{{ $subCategory->cate_id }}">― {{ $subCategory->cate_name }}</option>
                @endforeach
            @endforeach
        </select>
        <button type="submit" class="btn btn-outline-secondary" type="button"><i class="fas fa-search"></i></button>
        <a href="{{ route('admin.books.export') }}" class="btn btn-outline-secondary"><i class="fas fa-file-export"></i></a>
      </div>
    </form>
</div>

@if (session('message'))
<div class="alert alert-{{ session('message.status') }} mb-4">
    {{ session('message.msg') }}
</div>
@endif
<div class="table-responsive">
    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th scope="col">@lang('admin.book.name')</th>
                <th scope="col">@lang('admin.book.thumbnail')</th>
                <th scope="col">@lang('admin.book.quantity')</th>
                <th scope="col">@lang('admin.book.description')</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td><a href="{{ route('book.detail', $book->book_id) }}"><b>{{ $book->book_title }}</b></a></td>
                <td>
                    @if ($book->book_image == null)
                        <img class="img-thumbnail w-25" src="image/library.png">
                    @else
                        <img src="images/books/{{ $book->book_image }}" class="img-thumbnail w-25">  
                    @endif
                </td>
                <td>{{ $book->quantity }}</td>
                <td>{{ str_limit($book->book_desc, 40) }}</td>
                <td>
                    <form action="{{ route('admin.books.destroy', $book->book_id) }}" method="POST"
                        class="form-inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-sm btn-outline-danger mr-1"><i class="fa fa-trash"
                                aria-hidden="true"></i></button>
                        <a href="{{ route('admin.books.edit', $book->book_id) }}">
                            <button type="button" class="btn btn-sm btn-outline-success"><i class="fa fa-pen"
                                    aria-hidden="true"></i></button>
                        </a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $books->links() }}
@endsection
