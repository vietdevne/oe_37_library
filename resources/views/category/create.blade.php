@extends('layouts.admin')
@section('title',trans('admin.category.create'))
@section('content')
<h2 class="mt-4 mb-4">@lang('admin.category.create')</h2>
@if ($errors->any())
<div class="alert alert-danger mb-4">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form class="form-horizontal bg-white pt-4 pb-4 pl-2 pr-2" method="POST" action="{{ route('admin.categories.store') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('cate_name') ? ' has-error' : '' }}">
        <label for="cate_name" class="col-md-4 control-label">@lang('admin.category.name')</label>
        <div class="col-md-12">
            <input id="cate_name" type="text" class="form-control" name="cate_name">
            @if ($errors->has('cate_name'))
            <span class="help-block">
                <strong>{{ $errors->first('cate_name') }}</strong>
            </span>
            @endif
        </div>
    </div>  
    <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
        <label for="parent_id" class="col-md-4 control-label">@lang('admin.category.parent')</label>
        <div class="col-md-12">
            <select id="parent_id" class="form-control" name="parent_id">
                <option value="">---</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->cate_id }}">{{ $category->cate_name }}</option>
                @endforeach
            </select>
            @if ($errors->has('parent_id'))
            <span class="help-block">
                <strong>{{ $errors->first('parent_id') }}</strong>
            </span>
            @endif
        </div>
    </div>  
    <div class="form-group{{ $errors->has('cate_desc') ? ' has-error' : '' }}">
        <label for="cate_desc" class="col-md-4 control-label">@lang('admin.category.description')</label>
        <div class="col-md-12">
            <textarea id="cate_desc" cols="12" class="form-control" name="cate_desc"></textarea>
            @if ($errors->has('cate_desc'))
            <span class="help-block">
                <strong>{{ $errors->first('cate_desc') }}</strong>
            </span>
            @endif
        </div>
    </div>  
    <div class="form-group">
        <div class="col-md-12">
            <button type="submit" class="btn btn-dark">
                @lang('admin.category.create')
            </button>
        </div>
    </div>  
</form>
@endsection
