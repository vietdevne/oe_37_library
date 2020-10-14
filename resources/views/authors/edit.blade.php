@extends('layouts.admin')
@section('title', trans('admin.home'))
@section('content')

<div class="container">
    
    <h2 class="mt-4 pb-2">@lang('admin.author_form.title_edit_form')</h2>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>{{ trans('message.author.add_fail') }}</strong>
            <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('admin.authors.update', $author->author_id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="">@lang('admin.author_form.label_name')</label>
            <input type="text" name="author_name" class="form-control" value="{{ $author->author_name }}">
        </div>

        <div class="form-group">
            <label for="">@lang('admin.author_form.label_avatar')</label>
            <input type="file" name="author_avatar" value="{{ $author->avatar }}">
            
        </div>

        <div class="form-group">
            <label for="">@lang('admin.author_form.label_desc')</label>
            <textarea class="form-control" name="author_desc" id="" cols="30" rows="10">{{ $author->author_desc }}</textarea>
        </div>
        
        <div class="form-group">
            <input type="submit" class="btn btn-outline-success" value="{{ trans('admin.actions.edit') }}">
        </div>
    </form>
</div>


@endsection
