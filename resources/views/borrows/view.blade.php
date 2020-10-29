@extends('layouts.admin')
@section('title', trans('admin.home'))
@section('content')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-4 mb-4">
  <h2>@lang('admin.borrow_table.title_table')</h2>
</div>
<div class="input-group mb-3">
  <form action="{{ route('admin.borrows.index') }}" method="GET" class="form-inline input-group">
    <input name="fullname" type="text" class="form-control" placeholder="{{ trans('admin.search.user') }}">
    <div class="input-group-append" id="button-addon4">
      <select class="form-control" name="status">
          <option value="">@lang('admin.borrow_table.borr_status')</option>
          @foreach(config('app.borr_status') as $key => $bor)
            <option value="{{ $key }}">{{ trans('admin.borrow_table.'.$bor) }}</option>
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
      <th scope="col">@lang('admin.borrow_table.id_col')</th>
      <th scope="col">@lang('admin.borrow_table.name_col')</th>
      <th scope="col">@lang('admin.borrow_table.book_col')</th>
      <th scope="col">@lang('admin.borrow_table.borrow_date')</th>
      <th scope="col">@lang('admin.borrow_table.return_date')</th>
      <th scope="col">@lang('admin.borrow_table.borr_status')</th>
      <th scope="col">@lang('admin.borrow_table.note')</th>
      <th scope="col" colspan="2"></th>
    </tr>
  </thead>
  <tbody>

    @foreach($borrows as $borrow)
      <tr>
        <th scope="row">{{ $borrow->borr_id }}</th>
        <td>{{ $borrow->user->fullname }}</td>
        <td>{{ $borrow->book->book_title }}</td>
        <td>{{ date(trans('admin.borrow_date_format'), strtotime($borrow->borrow_date)) }}</td>

        <td>{{ date(trans('admin.borrow_date_format'), strtotime($borrow->return_date)) }}</td>
        <td>
            <form action="{{ route('admin.borrows.update', $borrow->borr_id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <select class="form-control" name="borr_status" onchange="this.form.submit();">
                    <option value="">@lang('admin.borrow_table.'.config('app.borr_status.'. $borrow->borr_status))</option>
                    @foreach(config('app.borr_status') as $key => $bor)
                        <option value="{{ $key }}">{{ trans('admin.borrow_table.'.$bor) }}</option>
                    @endforeach
                </select>
                <noscript><input type="submit" value="Submit"></noscript>
            </form>
        </td>
        <td>
            {{ $borrow->note }}
        </td>
        <td>
          <form action="{{ route('admin.borrows.destroy', $borrow->borr_id) }}" method="post">
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
    @if ($borrows->hasPages())
      {{ $borrows->links() }}
    @endif
  </nav>
</div>
@endsection
