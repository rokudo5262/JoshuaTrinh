@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Setting</h2>
            </div>
            <div class="card-body">
                <ul>
                @foreach ($users as $user)
                <li>{{ $user->full_name }}</li>
                @if(is_object($user->first_post))
                <li>{{ $user->first_post->title }}</li>
                @else
                <li>This User Don't Post Anything Yet</li>
                @endif
                <hr>
                @endforeach
                </ul>
                @foreach ($posts as $post)
                <li>{{ $post->title }}</li>
                <li>{{ $post->comment_count }}</li>
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
