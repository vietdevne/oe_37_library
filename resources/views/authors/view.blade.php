@extends('layouts.admin')
@section('title', trans('admin.home'))
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-4 mb-4">
  <h2>@lang('admin.author_table.title_table')</h2>
  <div><a href="{{ route('admin.authors.create') }}"><button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>
          @lang('admin.actions.new')</button></a></div>
</div>

<div class="input-group mb-3">
  <form action="{{ route('admin.authors.index') }}" method="GET" class="form-inline input-group">
    <input name="search" type="text" class="form-control" placeholder="{{ trans('admin.search.author') }}">
    <div class="input-group-append" id="button-addon4">
      <button type="submit" class="btn btn-outline-secondary" type="button"><i class="fas fa-search"></i></button>
      <a href="{{ route('admin.authors.export') }}" class="btn btn-outline-secondary"><i class="fas fa-file-export"></i></a>
    </div>
  </form>
</div>

@if (session()->has('del_success'))
  <div class="alert alert-success">{{ session()->get('del_success') }}</div>
@elseif( session()->has('add_success'))
  <div class="alert alert-success">{{ session()->get('add_success') }}</div>
@elseif (session()->has('update_success'))
  <div class="alert alert-success">{{ session()->get('update_success') }}</div>
@endif

<table class="table table-bordered bg-white">
  <thead>
    <tr>
      <th scope="col">@lang('admin.author_table.id_col')</th>
      <th scope="col">@lang('admin.author_table.name_col')</th>
      <th scope="col">@lang('admin.author_table.avatar_col')</th>
      <th scope="col">@lang('admin.author_table.desc_col')</th>
      <th scope="col" colspan="2" class="text-center"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($authors as $key => $author)
      <tr>
        <th scope="row">{{ $author->author_id }}</th>
        <td>{{ $author->author_name }}</td>
        <td>
          @if(file_exists( public_path().'/images/authors/'.$author->author_image || $author->author_image != null ))
            <img src="images/authors/{{ $author->author_image }}" class="img-thumbnail p-0 mb-4 border-0 rounded-circle">   
          @else
            <img src="images/authors/author.png" class="img-thumbnail p-0 mb-4 border-0 rounded-circle">
          @endif
        </td>
        <td>{{ $author->author_desc }}</td>
        <td>
          <form action="{{ route('admin.authors.destroy', $author->author_id) }}" method="post">
            <div class="input-group">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <div class="input-group-append" id="button-addon4">
                <a href="{{ route('admin.authors.edit', $author->author_id) }}" class="btn btn-sm btn-outline-success"><i class="fa fa-pen"aria-hidden="true"></i></a>
                <button class="btn btn-sm btn-outline-danger ml-1" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
              </div>
            </div>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
<div class="col-md-12 text-center justify-content-center">
  <nav aria-label="Page navigation">
    @if ($authors->hasPages())
      {{ $authors->links() }}
    @endif
  </nav>
</div>

@endsection
