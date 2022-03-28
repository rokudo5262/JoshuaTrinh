<<!DOCTYPE html>
<html>
<head>
    <title>Search User</title>
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/user.css') }}" />
    <<script src="{{ asset('js/user.js') }}"></script>
</head>
<body>
    @include('header')
    <div class="search-bar">
        <input type="text" placeholder="Search..">
    </div>
    <div class="content">
        <a type="button" class="button button-info" href="{{ config('app.url')}}/user">BACK</a>
    </div>
    @include('footer')
</body>
</html>