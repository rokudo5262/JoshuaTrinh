@extends('layouts.app')

@section('content') 
    <div class="flex-center position-ref full-height">  
        <div class="content">
            <h2>Change Password</h2>
            <form method="POST" action="{{ config('app.url')}}/handle_change_password">
                @csrf
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
    <div class="content">
        <button class="button" href="{{ config('app.url')}}/user">BACK</button>
    </div>
@endsection