@extends('layouts.app')

@section('content')
    <div class="content">
        <h2>User Update</h2>
        <form method="POST" action="{{ config('app.url')}}/user/update/{{$user->id}}">
            @csrf
            <div class="form-input">
                <label>First Name</label>
                <input type="text" name="first_name" value="{{$user->first_name}}">
            </div>
            <div class="form-input">
                <label>Last Name</label>
                <input type="text" name="last_name" value="{{$user->last_name}}">
            </div>
            <div class="form-input">
                <label>Email</label>
                <input type="text" name="email" value="{{$user->email}}">
            </div>
            <div class="form-input">
                <label>Date Of Birth</label>
                <input type="text" name="date_of_birth" value="{{$user->date_of_birth}}">
            </div>
            <div class="form-input">
                <label>Password</label> <input type="password" name="password">
            </div>
            <button type="submit">Save</button>
        </form>
    </div>
    <div class="content">
        <a type="button" href="{{ config('app.url')}}/user">BACK</a>
    </div>
@endsection