<!doctype html>
<html>
<head>
  <title>Update User</title>
  <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/user.css') }}" />
  <script src="{{ asset('js/user.js') }}"></script>
  <!-- styling etc. -->
<body>
    @include('header')
    <div class="flex-center position-ref full-height">  
        <div class="content">
            <form method="POST" action="{{ config('app.url')}}/user/update/{{$user->id}}">
                @csrf
                <h1>add user</h1>
                <div class="form-input">
                    <label>first_name</label>
                    <input type="text" name="first_name" value="{{$user->first_name}}">
                </div>
                <div class="form-input">
                    <label>last_name</label>
                    <input type="text" name="last_name" value="{{$user->last_name}}">
                </div>
                <div class="form-input">
                    <label>email</label>
                    <input type="text" name="email" value="{{$user->email}}">
                </div>
                <div class="form-input">
                    <label>date of birth</label>
                    <input type="text" name="date_of_birth" value="{{$user->date_of_birth}}">
                </div>
                <div class="form-input">
                    <label>password</label> <input type="password" name="password">
                </div>
                <button type="submit">Edit User</button>
            </form>
        </div>
    </div>
    <div class="content">
        <a type="button" class="button button-info" href="{{ config('app.url')}}/user">BACK</a>
    </div>
    @include('footer')
</body>
</html>