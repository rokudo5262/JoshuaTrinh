@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Post Detail</h2>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>
                <div class="col-md-6">
                    <input class="form-control" type="text" name="title" value="{{ $post->title }}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label for="content" class="col-md-4 col-form-label text-md-end">Content</label>
                <div class="col-md-6">
                    <textarea  class="form-control" name="content" readonly>{{ $post->content }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
            
            </div>
            <div class="row mb-3">
                <label for="author" class="col-md-4 col-form-label text-md-end">Author</label>
                <div class="col-md-6">
                    <input  class="form-control" name="author" value="{{$post->user->full_name}}" readonly/>
                </div>
            </div>
            <div class="row mb-3">
                <label for="status" class="col-md-4 col-form-label text-md-end">Status</label>
                <div class="col-md-6">
                    <input  class="form-control" name="author" value="{{ $post->post_status }}" readonly/>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a type="button" href="{{ route('post') }}">BACK</a>
        </div>
    </div>
</div>
@endsection