<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/user.css') }}" />
        <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/admin.css') }}" />
        <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/post.css') }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
        <script type="text/javascript" src="{{ asset('js/user.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/post.js') }}"></script>
        <script src="{{ mix('/js/app.js') }}"></script>
    </script>
    </head>
    <body>
        @section('header')
            @include('layout.header')
        @show
        <div class="warp">
            <div class="sidebar">
            @section('sidebar')
                @include('layout.sidebar')
            @show
            </div>
            <div class="container">
                @yield('content')
                @section('footer')
                    @include('layout.footer')
                @show
            </div>
        </div>
    </body>
</html>