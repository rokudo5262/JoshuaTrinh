<html>
    <head>
        <style>
            .profile_pic{
                height: 50px;
                width: 50px;
            }
        </style>
    </head>
    <body>
        @include('header')
        @if($user->profile_picture==Null)
            <img src="image/avatar.png" class="profile_pic" alt="alt text">
        @else
            <img src="storage/image/{{$user->id}}/{{$user->profile_picture}}" class="profile_pic" alt="alt text"> 
        @endif
        <div class="flex-center position-ref full-height">
            <h3>{{$full_name}}</h3>
            <p>{{$user->email}}</p>
            <p>{{$user->password}}</p>
        </div>
        <div class="flex-center position-ref full-height">
            <h3>{{$full_name}}'s Post</h3>
                @foreach($posts as $post)
                    <p>{{ $post->title }}</p>
                    <p>{{ $post->content }}</p>
                    <p>{{ $post->slug }}</p>
                @endforeach
        </div>
        <div class="flex-center position-ref full-height">
            <a type="button" href="{{ config('app.url')}}/user">back</a>
        </div>
</body>
</html>