@extends('layouts.app')

@section('content')
    <!-- @if ($errors->all())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>    
    @endif -->
    <!-- <div class="alert alert-success" style="display:none"></div>
    <div class="content">
        <form id="create_new_user" method="POST" action="{{ config('app.url')}}/user/store">
            @csrf
            <div class="form-group">
                <div class="form-input">
                    <label>Profile Picture :</label>
                    <input type="file" name="profile_picture"/>
                </div>
                <div class="form-input">
                    <label>First Name :</label>
                    <input type="text" name="first_name"/>
                </div>
                <div class="form-input">
                    <label>Last Name :</label>
                    <input type="text" name="last_name"/>
                </div>
                <div class="form-input">
                    <label>Email :</label>
                    <input type="text" name="email"/>
                </div>
                <div class="form-input">
                    <label>Password :</label>
                    <input type="password" name="password"/>
                </div>
            <button type="submit">Submit</button>
            </div>
        </form>
    </div>
    <div class="content">
        <a type="button" href="{{ config('app.url')}}/user">BACK</a>
    </div> -->
    <create-user-component></create-user-component>
@endsection