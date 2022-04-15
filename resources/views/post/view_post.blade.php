@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Post List</h2>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-primary mb-3" href="{{ config('app.url')}}/post/create">Create New Post</a>
            <table class="table">
                <thead>
                    <td></td>
                    <td>Id</td>
                    <td>Title</td>
                    <td>Slug</td>
                    <td>Comment</td>
                    <td>Author</td>
                    <td>Post Status</td>
                    <td>Created At</td>
                    <td>Action</td>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr id="{{ $post->id }}">
                        <td><input type="checkbox" id="{{ $post->id }}" value="{{ $post->id }}"></td>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->comment_count }}</td>
                        <td>
                            <a href="{{ config('app.url') }}/user/show/{{ $post->user->id }}">{{ $post->user->full_name }}</a>
                        </td>
                        <td>{{ $post->status }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>
                            <a type="button" href="{{ config('app.url') }}/post/show/{{ $post->id }}">Detail</a>
                            <a type="button" href="{{ config('app.url') }}/post/edit/{{ $post->id }}">Edit</a>
                            <a type="button" href="{{ config('app.url') }}/post/delete/{{ $post->id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a type="button" href="#">BACK</a>
        </div>
    </div>
</div>
<post-component :posts = "{{ json_encode($posts) }}"></post-component>
@endsection