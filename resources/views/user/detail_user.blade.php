<html>
    <head>
        <title>User Detail</title>
        <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/user.css') }}" />
        <script src="{{ asset('js/user.js') }}"></script>
    </head>
    <body>
        @include('header')
        @if ($user->profile_picture == null)
            <img src="image/avatar.png" class="profile_pic" alt="alt text">
        @else
            <img src="storage/image/{{$user->id}}/{{$user->profile_picture}}" class="profile_pic" alt="alt text"> 
        @endif
        <div class="flex-center position-ref full-height">
            <h3>{{ $user->full_name }}</h3>
            <p>{{ $user->email }}</p>
            <p>{{ $user->password }}</p>
        </div>
        <div class="flex-center position-ref full-height">
            <h3>{{ $user->full_name }}'s Post</h3>
                
                @foreach ($posts as $post)
                <div style="border:1px solid black; width:100px; float:left;" class="card">
                    <h4>{{ $post->title }}</h4>
                    <p>{{ $post->content }}</p>
                    <p>{{ $post->slug }}</p>
                </div>
                @endforeach
        </div>
        <hr>
        <div class="content">
        <a type="button" class="button" href="{{ config('app.url')}}/user">BACK</a>
    </div>
        @include('footer')
</body>
</html>