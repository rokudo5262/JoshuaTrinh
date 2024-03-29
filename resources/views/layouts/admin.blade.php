<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Joshua') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        [v-cloak] {
            display: none;
        }
    </style>
</head>
<body>
    <div id="app" style="overflow:hidden;" v-cloak>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <h2><a href="{{ route('dashboard') }}">Admin</a></h2>
            </div> 
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">   
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                                <a class="dropdown-item" href="{{ route('change_password') }}">Change Password</a>
                                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <div class="row">
                <div class="col-3">
                    <div class="container">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ config('app.url')}}/admin/user">User</a>
                            </li>
                            <li class="list-group-item">
<<<<<<< Updated upstream
                                <a href="{{ config('app.url')}}/admin/post">Post</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ config('app.url')}}/admin/task">Task</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ config('app.url')}}/admin/setting">Setting</a>
=======
                                <a href="{{ config('app.url')}}/admin/post">Post</a></li>
                            <li class="list-group-item"><a href="{{ config('app.url')}}/admin/role">Role</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ config('app.url')}}/admin/setting">System Setting</a>
>>>>>>> Stashed changes
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-9">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>
