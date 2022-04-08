<html>
    <head>
        <title>Login</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/login.css') }}" />
    </head>
    <body>
        @if ($errors->all())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>    
        @endif
        <div class="content">
            <form method="post" action="{{ config('app.url')}}/handle_login">
                @csrf
                <h1>Login</h1>
                <div class="form-input">
                    <label>Email</label> <input type="text" name="email" >
                </div>
                <div class="form-input">
                    <label>Password</label> <input type="password" name="password" id="myInput">
                    <input type="checkbox" onclick="myFunction()">
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="links">
            <a type="button" href="{{ config('app.url')}}/register">Register</a>
            <a type="button" href="{{ config('app.url')}}/forget_password">Forget Password</a>
            </div>
        <script>
            function myFunction() {
              var x = document.getElementById("myInput");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
        </script>
    </body>
</html>
