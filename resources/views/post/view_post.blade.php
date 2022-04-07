@extends('layout.app')

@section('title', 'View Post')

@section('content')
<div class="content">
    <h2>Post List</h2>
    <a type="button" class="button button-primary" href="{{ config('app.url')}}/post/create">Create User</a>
</div>
<div class="content">
    <div class="alert alert-success" style="display:none"></div>
    <table class="table">
        <caption>Posts</caption>
        <thead>
            <td></td>
            <td>Id</td>
            <td>Title</td>
            <td>Slug</td>
            <td>Status</td>
            <td>Author</td>
            <td>Action</td>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr id="{{ $post->id }}">
                <td><input type="checkbox" id="{{ $post->id }}" value="{{ $post->id }}"></td>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->user->full_name }}</td>
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
@endsection