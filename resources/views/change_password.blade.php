<html>
    <head>
        <title>Change Password</title>
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
                <form method="POST" action="{{ config('app.url')}}/handle_change_password">
                    @csrf
                    <h1>Change Password</h1>
                    <div class="form-input">
                        <label>current_password</label>
                        <input type="text" name="current_password" >
                    </div>
                    <div class="form-input">
                        <label>new_password</label>
                        <input type="password" name="new_password" >
                    </div>
                    <div class="form-input">
                        <label>new_password_confirmation</label>
                        <input type="password" name="new_password_confirmation" >
                    </div>
                    <button type="submit">Change Password</button>
                </form>
            </div>
        </div>
        <div class="flex-center position-ref full-height">
            <a type="button" href="{{ config('app.url')}}/user">back</a>
        </div>
    </body>
</html>