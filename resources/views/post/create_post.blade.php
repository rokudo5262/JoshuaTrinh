@extends('layout.app')

@section('title', 'Create Post')

@section('content')
<div class="alert alert-success" style="display:none"></div>
<div class="container">
    <div class="row">
        <h1>Create Post</h1>
        <form action="" class="form" method="post">
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea class="form-control" name="content" cols="3" rows="5"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection