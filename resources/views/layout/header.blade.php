<div class="section-header header">
    @if(auth()->user()->profile_picture == null)
        <img src="/image/avatar.png" class="profile_pic" alt="alt text">
    @else
        <img src="storage/image/{{auth()->user()->id}}/{{ auth()->user()->profile_picture }}" class="profile_pic" alt="alt text"> 
    @endif
    <ul>
        <li>
            <a type="button" href="{{ config('app.url')}}/profile">Profile</a>
        </li>
        <li>
            <a type="button" href="{{ config('app.url')}}/change_password">Change Password</a>
        </li>
        <li>
            <a type="button" href="{{ config('app.url')}}/logout">Logout</a>
        </li>
    </ul>
</div>