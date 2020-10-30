@extends('layouts.admin')
@section('title', trans('admin.home'))
@section('content')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-4 mb-4">
  <h2>@lang('admin.reviews')</h2>
</div>
<h2 class="mt-4 pb-2"></h2>

<div class="input-group mb-3">
  <form action="{{ route('admin.reviews.index') }}" method="GET" class="form-inline input-group">
    <input name="search" type="text" class="form-control" placeholder="{{ trans('admin.search.review') }}">
    <div class="input-group-append" id="button-addon4">
      <select class="form-control" name="searchRate">
          <option value="">@lang('admin.review_table.rate_col')</option>
          @foreach(config('app.rating') as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
          @endforeach
      </select>
      <button type="submit" class="btn btn-outline-secondary" type="button"><i class="fas fa-search"></i></button>
    </div>
  </form>
</div>

@if( session()->has('del_success'))
  <div class="alert alert-success">{{ session()->get('del_success') }}</div>
@elseif( session()->has('add_success'))
  <div class="alert alert-success">{{ session()->get('add_success') }}</div>
@elseif( session()->has('update_success'))
  <div class="alert alert-success">{{ session()->get('update_success') }}</div>
@endif

<table class="table table-bordered bg-white">
  <thead>
    <tr>
      <th scope="col">@lang('admin.review_table.id')</th>
      <th scope="col">@lang('admin.review_table.user_col')</th>
      <th scope="col">@lang('admin.review_table.book_col')</th>
      <th scope="col">@lang('admin.review_table.content_col')</th>
      <th scope="col">@lang('admin.review_table.rate_col')</th>
      <th scope="col">@lang('admin.review_table.date_col')</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

    @foreach($reviews as $review)
      <tr>
        <th scope="row">{{ $review->review_id }}</th>
        <td>{{ $review->user->fullname }}</td>
        <td>{{ $review->book->book_title }}</td>
        <td>{{ $review->content }}</td>
        <td>{{ config('app.rating.' . $review->rate) }}</td>
        <td>{{ date(trans('admin.date_format'), strtotime($review->updated_at)) }}</td>
        <td>
          <form action="{{ route('admin.reviews.destroy', $review->review_id) }}" method="post">
            <div class="input-group">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <div class="input-group-append" id="button-addon4">
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
    @if ($reviews->hasPages())
      {{ $reviews->links() }}
    @endif
  </nav>
</div>

@endsection
