<html>
    <head>
        <title>Forget Password</title>
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
        <div class="flex-center position-ref full-height">  
            <div class="content">
                <form method="POST" action="">
                    @csrf
                    <h1>Forget Password</h1>
                    <div class="form-input">
                        <label>email</label>
                        <input type="text" name="email" >
                    </div>
                    <button type="submit">Reset password</button>
                </form>
            </div>
        </div>
    </body>
</html>