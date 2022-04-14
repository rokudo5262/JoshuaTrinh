@extends('layouts.admin')

@section('content')
    <div class="alert alert-success" style="display:none"></div>
    <div class="container">
        <div class="row">
            <h2>Create New Post</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control" name="content"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
    <div class="content">
        <a type="button" href="{{ config('app.url')}}/post">BACK</a>
    </div>
@endsection