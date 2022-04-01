<html>
    <head>
        <title>profile</title>
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
        <div class="flex-center position-ref full-height">
            <h3>Change Profile Picture</h3>
            @if ($errors->all())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>    
            @endif
            <form method="post" enctype="multipart/form-data" action="{{ config('app.url')}}/handle_change_profile_picture">
                @csrf
                <div class="form-input">
                    <label>Profile Picture</label>
                    <input type="file" name="profile_picture" >
                </div>
                <button type="submit">Save</button>
            </form>
        </div>
        <div class="flex-center position-ref full-height">
            <h3>User Info</h3>
                <div class="form-input">
                    <label>First Name</label>
                    <input type="text" name="first_name" value="{{auth()->user()->first_name}}">
                </div>
                <div class="form-input">
                    <label>Last Name</label>
                    <input type="text" name="last_name" value="{{auth()->user()->last_name}}">
                </div>
                <div class="form-input">
                    <label>email</label>
                    <input type="text" name="email" value="{{auth()->user()->email}}">
                </div>
                <div class="form-input">
                    <label>date of birth</label>
                    <input type="text" name="email" value="{{auth()->user()->date_of_birth}}">
                </div>
            </form>
        </div>
        <div class="flex-center position-ref full-height">
            <a type="button" href="{{ config('app.url')}}/user">back</a>
        </div>
        @include('footer')
    </body>
</html>