<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Post Page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/user.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/post.css') }}" />
    <script type="text/javascript"  src="{{ asset('js/post.js') }}"></script>
</head>
<body>
    @include('header')
    <h3>Post List</h3>
    @foreach($posts as $post)
    <div class="post" style="float:left;border-color:black;border-style: solid; margin:2px; padding:4px;">
        <img href="">
        <h4>{{ $post->title }}</h4>
        <p>{{ $post->content }}</p>
        <p>{{ $post->created_at }}</p>
        <p>Author: {{ $post->user->full_name }}</p>
    </div>
    @endforeach
    @include('footer')
</body>
</html>