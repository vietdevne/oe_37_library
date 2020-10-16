@extends('layouts.admin')
@section('title', trans('admin.home'))
@section('content')

<div class="container">
  <h2 class="mt-4 pb-2">@lang('admin.publisher_table.title_table')</h2>

  @if( session()->has('del_success'))
    <div class="alert alert-success">{{ session()->get('del_success') }}</div>
  @elseif( session()->has('add_success'))
    <div class="alert alert-success">{{ session()->get('add_success') }}</div>
  @elseif( session()->has('update_success'))
    <div class="alert alert-success">{{ session()->get('update_success') }}</div>
  @endif

  <table class="table">
    <thead>
      <tr>
        <th scope="col">@lang('admin.publisher_table.id_col')</th>
        <th scope="col">@lang('admin.publisher_table.name_col')</th>
        <th scope="col">@lang('admin.publisher_table.logo_col')</th>
        <th scope="col">@lang('admin.publisher_table.desc_col')</th>
        <th scope="col" colspan="2"><a href="{{route('admin.publishers.create')}}"class="btn btn-success">@lang('admin.actions.new')</a></th>
      </tr>
    </thead>
    <tbody>

      @foreach($publishers as $key => $publisher)
        <tr>
          <th scope="row">{{ $publisher->pub_id }}</th>
          <td>{{ $publisher->pub_name }}</td>
          <td><img width="100" height="100" src="image/{{$publisher->pub_logo}}" alt=""></td>
          <td>{{ $publisher->pub_desc }}</td>
          <td>
            <a href="{{ route('admin.publishers.edit', $publisher->pub_id) }}" class="btn btn-warning">@lang('admin.actions.edit')</a>
          </td>
          <td>
            <form action="{{ route('admin.publishers.destroy', $publisher->pub_id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input class="btn btn-danger" type="submit" value="{{ trans('admin.actions.delete') }}">
            </form>
          </td>
        </tr>
      @endforeach
      
    </tbody>
  </table>
  <div class="col-md-12 text-center justify-content-center">
    <nav aria-label="Page navigation">
      @if ($publishers->hasPages())
        {{ $publishers->links() }}
      @endif
    </nav>
  </div>
</div>

@endsection
