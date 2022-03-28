<!doctype html>
<html>
<head>
  <title>Create User</title>
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
    <div class="flex-center position-ref full-height">  
        <div class="content">
            <form method="POST" enctype="multipart/form-data" action="{{ config('app.url')}}/user/store">
                @csrf
                <h1>add user</h1>
                <div class="form-input">
                    <label>Profile Picture</label>
                    <input type="file" name="profile_picture" >
                </div>
                <div class="form-input">
                    <label>first_name</label> <input type="text" name="first_name">
                </div>
                <div class="form-input">
                    <label>last_name</label> <input type="text" name="last_name">
                </div>
                <div class="form-input">
                    <label>email</label> <input type="text" name="email" >
                </div>
                <div class="form-input">
                    <label>password</label> <input type="password" name="password" >
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
    <div class="content">
        <a type="button" class="button" href="{{ config('app.url')}}/user">BACK</a>
    </div>
    @include('footer')
</body>
</html>