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
                <li>{{ $post }}</li>
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
