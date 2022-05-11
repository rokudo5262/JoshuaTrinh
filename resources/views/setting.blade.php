@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Setting</h2>
            </div>
            <div class="card-body">
                <ul>
                @foreach ($posts as $post)
                <li>{{ $post->title }}</li>
                <!-- <li>{{ $post->author }}</li> -->
                <li>{{ $post->user->full_name }}</li>
                <!-- <li>{{ $post->comment_count }}</li> -->
                <li>{{ $post->comment->count() }}</li>
                <hr>
                @endforeach
                </ul>
            </div>
            <div class="card-footer">
                <a type="button" href="/admin">dashboard</a>
            </div>
        </div>
    </div>
@endsection
