@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>User Detail</h2>
            </div>
            <div class="card-body">
                @if ($user->profile_picture == null)
                    <img src="/image/avatar.png" class="profile_pic" alt="alt text">
                @else
                    <img src="storage/image/{{$user->id}}/{{$user->profile_picture}}" class="profile_pic" alt="alt text"> 
                @endif
                <h3>{{ $user->full_name }}</h3>
                <p>{{ $user->email }}</p>
                <p>{{ $user->password }}</p>
            </div>
            <div class="content">
                <h3>{{ $user->full_name }}'s Post</h3>
                @if( count($posts) == 0)
                    <p>No data to display</p>
                @else
                    @foreach ($posts as $post)
                    <div class="card">
                        <img src="/image/image.jfif" alt="post">
                        <div class="container">
                            <h3>{{ $post->title }}</h3>
                            <p>{{ $post->slug }}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
            </div>
            <div class="card-footer">
                <a type="button" href="{{ config('app.url')}}/user">BACK</a>
            </div>
        </div>
        <detail-user-component></detail-user-component>
@endsection