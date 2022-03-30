<html>
    <head>
        <title>Register</title>
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
            <form method="POST" action="{{ config('app.url')}}/handle_register">
                @csrf
                <h1>Register</h1>
                <div class="form-input">
                    <label>first name</label>
                    <input type="text" name="first_name" >
                    <label>last name</label>
                    <input type="text" name="last_name" >
                </div>
                <div class="form-input">
                    <label>email</label>
                    <input type="text" name="email" >
                </div>
                <div class="form-input">
                    <label>password</label>
                    <input type="password" name="password" >
                </div>
                <div class="form-input">
                    <label>password_confirmation</label>
                    <input type="password" name="password_confirmation" >
                </div>
                <button type="submit">Register</button>
            </form>
        </div>
    </body>
</html>
