<!doctype html>
<html>
<head>
  <title>Create User</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous">
    </script>
  <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/user.css') }}" />
  <script src="{{ asset('js/user.js') }}"></script>
</head>
<body>
    @include('header')
    @if ($errors->all())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>    
    @endif
    <div class="alert alert-success" style="display:none"></div>
    <div class="content">
        <form id="create_new_user">
            @csrf
            <h1>Add New User</h1>
            <div class="form-input">
                <label>Profile Picture</label>
                <input type="file" name="profile_picture">
            </div>
            <div class="form-input">
                <label>first_name</label>
                <input type="text" name="first_name">
            </div>
            <div class="form-input">
                <label>last_name</label>
                <input type="text" name="last_name">
            </div
            <div class="form-input">
                <label>email</label>
                <input type="text" name="email">
            </div>
            <div class="form-input">
                <label>password</label>
                <input type="password" name="password" id="password">
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
    <div class="content">
        <a type="button" class="button button-info" href="{{ config('app.url')}}/user">BACK</a>
    </div>
    @include('footer')
</body>

</html>