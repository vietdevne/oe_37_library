@extends('layouts.admin')
@section('title', trans('admin.home'))
@section('content')

<div class="container">
  <h2 class="mt-4 pb-2">@lang('admin.author_table.title_table')</h2>

  @if (session()->has('del_success'))
    <div class="alert alert-success">{{ session()->get('del_success') }}</div>
  @elseif( session()->has('add_success'))
    <div class="alert alert-success">{{ session()->get('add_success') }}</div>
  @elseif (session()->has('update_success'))
    <div class="alert alert-success">{{ session()->get('update_success') }}</div>
  @endif

  <table class="table">
    <thead>
      <tr>
        <th scope="col">@lang('admin.author_table.id_col')</th>
        <th scope="col">@lang('admin.author_table.name_col')</th>
        <th scope="col">@lang('admin.author_table.avatar_col')</th>
        <th scope="col">@lang('admin.author_table.desc_col')</th>
        <th scope="col" colspan="2"><a href="{{route('admin.authors.create')}}"class="btn btn-success">@lang('admin.actions.new')</a></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($authors as $key => $author)
        <tr>
          <th scope="row">{{ $author->author_id }}</th>
          <td>{{ $author->author_name }}</td>
          <td><img width="100" height="100" src="image/{{ $author->author_avatar }}" alt=""></td>
          <td>{{ $author->author_desc }}</td>
          <td>
            <a href="{{ route('admin.authors.edit', $author->author_id) }}" class="btn btn-warning">@lang('admin.actions.edit')</a>
          </td>
          <td>
            <form action="{{ route('admin.authors.destroy', $author->author_id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input class="btn btn-danger" type="submit" value="{{ trans('admin.actions.delete') }}">
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
