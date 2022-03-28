<html>
    <head>
        <style>
            div.header {
                background-color: coral;
            }
            .profile_pic{
                float:right;
                height: 50px;
                width: 50px;
            }
                
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height header">
            @if(auth()->user()->profile_picture==NUll)
                <img src="image/avatar.png" class="profile_pic" alt="alt text">
            @else
                <img src="storage/image/{{auth()->user()->id}}/{{auth()->user()->profile_picture}}" class="profile_pic" alt="alt text"> 
            @endif
            <ul>
                <li>
                    <a type="button" href="{{ config('app.url')}}/profile">profile</a>
                </li>
                <li>
                    <a type="button" href="{{ config('app.url')}}/change_password">Change Password</a>
                </li>
                <li>
                    <a type="button" href="{{ config('app.url')}}/logout">logout</a>
                </li>
            </ul>
        </div>
    </body>
</html>
