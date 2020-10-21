@extends('layouts.admin')
@section('title',trans('admin.books'))
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-4 mb-4">
    <h2>@lang('admin.books')</h2>
    <div><a href="{{ route('admin.books.create') }}"><button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>
            @lang('admin.book.create')</button></a></div>
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
                <td><a href="#"><b>{{ $book->book_title }}</b></a></td>
                <td>
                    @if(file_exists( public_path().'/images/books/'.$book->book_image ))
                        <img src="images/books/{{ $book->book_image }}" class="img-thumbnail w-25">
                    @else
                        <img class="img-thumbnail w-25" src="image/library.png">
                    @endif
                </td>
                <td>{{ $book->quantity }}</td>
                <td>{{ str_limit($book->book_desc, 40) }}</td>
                <td>
                    <form action="{{ route('admin.books.destroy',$book->book_id) }}" method="POST"
                        class="form-inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-sm btn-outline-danger mr-1"><i class="fa fa-trash"
                                aria-hidden="true"></i></button>
                        <a href="{{ route('admin.books.edit',$book->book_id) }}">
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
