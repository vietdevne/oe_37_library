@extends('layouts.admin')
@section('title', trans('admin.home'))
@section('content')

<div class="container">
    
    <h2 class="mt-4 pb-2">@lang('admin.publisher_form.title_edit_form')</h2>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>{{ trans('message.author.update_fail') }}</strong>
            <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('admin.publishers.update', $publisher->pub_id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="">@lang('admin.publisher_form.label_name')</label>
            <input type="text" name="pub_name" class="form-control" value="{{ $publisher->pub_name }}">
        </div>

        <div class="form-group">
            <label for="">@lang('admin.publisher_form.label_avatar')</label>
            <input type="file" name="pub_logo" value="{{ $publisher->pub_logo }}">
            
        </div>

        <div class="form-group">
            <label for="">@lang('admin.publisher_form.label_desc')</label>
            <textarea class="form-control" name="pub_desc" id="" cols="30" rows="10">{{ $publisher->pub_desc }}</textarea>
        </div>
        
        <div class="form-group">
            <input type="submit" class="btn btn-outline-success" value="{{ trans('admin.actions.edit') }}">
        </div>
    </form>
</div>


@endsection
