@extends('layouts.admin')
@section('title',trans('admin.categories'))
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-4 mb-4">
    <h2>@lang('admin.categories')</h2>
    <div><a href="{{ route('admin.categories.create') }}"><button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>
            @lang('admin.category.create')</button></a></div>
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
                <th scope="col">@lang('admin.category.name')</th>
                <th scope="col">@lang('admin.category.description')</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td><a href="#"><b>{{ $category->cate_name }}</b></a></td>
                <td>{{ str_limit($category->cate_desc, 40) }}</td>
                <td>
                    <form action="{{ route('admin.categories.destroy',$category->cate_id) }}" method="POST"
                        class="form-inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-sm btn-outline-danger mr-1"><i class="fa fa-trash"
                                aria-hidden="true"></i></button>
                        <a href="{{ route('admin.categories.edit',$category->cate_id) }}">
                            <button type="button" class="btn btn-sm btn-outline-success"><i class="fa fa-pen"
                                    aria-hidden="true"></i></button>
                        </a>
                    </form>
                </td>
            </tr>
            @foreach ($category->children as $subCategory)
            <tr>
                <td><a href="#"><b>― {{ $subCategory->cate_name }}</b></a></td>
                <td>{{ str_limit($subCategory->cate_desc, 40) }}</td>
                <td>
                    <form action="{{ route('admin.categories.destroy',$subCategory->cate_id) }}" method="POST"
                        class="form-inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-sm btn-outline-danger mr-1"><i class="fa fa-trash"
                                aria-hidden="true"></i></button>
                        <a href="{{ route('admin.categories.edit',$subCategory->cate_id) }}">
                            <button type="button" class="btn btn-sm btn-outline-success"><i class="fa fa-pen"
                                    aria-hidden="true"></i></button>
                        </a>
                    </form>
                </td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
</div>
{{ $categories->links() }}
@endsection
