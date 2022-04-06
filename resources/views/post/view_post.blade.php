@extends('layout.app')

@section('title', 'Create Post')

@section('content')
    <h3>Post List</h3>
    @foreach($posts as $post)
    <div class="post" style="float:left;border-color:black;border-style: solid; margin:2px; padding:4px;">
        <a type="button" href="{{ config('app.url') }}/post/show/{{ $post->id }}">
            <img src="/image/image.jfif" alt="post">
        </a>
        <h4>{{ $post->title }}</h4>
        <p>{{ $post->content }}</p>
        <p>{{ $post->created_at }}</p>
        <p>Author: <a type="button" href="{{ config('app.url') }}/user/show/{{ $post->user->id }}">{{ $post->user->full_name }}</a></p>
    </div>
    @endforeach
@endsection