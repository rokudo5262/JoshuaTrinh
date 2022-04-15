@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
        <div class="card-header">
            <h2>User Update</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ config('app.url')}}/user/update/{{$user->id}}">
                @csrf
                <div class="row mb-3">
                    <label for="first_name" class="col-md-4 col-form-label text-md-end">First Name</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="first_name" value="{{$user->first_name}}"/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="last_name" class="col-md-4 col-form-label text-md-end">Last Name</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="last_name" value="{{$user->last_name}}"/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="email" value="{{$user->email}}"/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="date_of_birth" class="col-md-4 col-form-label text-md-end">Date Of Birth</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="email" value="{{$user->date_of_birth}}"/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="email" value="{{$user->password}}"/>
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <a type="button" href="{{ config('app.url')}}/user">BACK</a>    
        </div>
    </div> 
@endsection