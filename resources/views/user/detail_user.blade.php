<html>
    <head>
        <title>User Detail</title>
        <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/user.css') }}" />
        <script src="{{ asset('js/user.js') }}"></script>
    </head>
    <body>
        @include('header')
        <div class="content">
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
        <div class="content">
            <a type="button" class="button button-info" href="{{ config('app.url')}}/user">BACK</a>
        </div>
        @include('footer')
</body>
</html>