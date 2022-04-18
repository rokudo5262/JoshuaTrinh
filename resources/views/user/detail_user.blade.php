@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>User Detail</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-9 mb-3">
                        <div class="row mb-3">
                            <label for="new_password" class="col-md-4 col-form-label">Full Name</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="full_name" value="{{ $user->full_name }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label">Email</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="email" value="{{ $user->email }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="date_of_birth" class="col-md-4 col-form-label">Date Of Birth</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="date_of_birth" value="{{ $user->date_of_birth }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone_number" class="col-md-4 col-form-label">Phone Number</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="phone_number" value="{{ $user->phone_number }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label">Address</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="address" value="{{ $user->address }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        @if ($user->profile_picture == null)
                            <img style="width: 100%; height: 100%; object-fit: contain;" src="/image/avatar.png" class="profile_pic" alt="alt text">
                        @else
                            <img style="width: 100%; height: 100%; object-fit: contain;" src="storage/image/{{$user->id}}/{{$user->profile_picture}}" class="profile_pic" alt="alt text"> 
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                @if( count($posts) == 0)
                    <p>No data to display</p>
                @else
                    @foreach ($posts as $post)
                    <div class="col-3 mb-3">
                        <div class="card">
                            <img src="/image/image.jfif" alt="post">
                            <div class="container">
                                <h3>
                                    <a href="{{ route('post.show',$post->id) }}">{{ $post->title }}</a>
                                </h3>
                                <p>{{ $post->slug }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
                </div>
            </div>
            <div class="card-footer">
                <a type="button" href="{{ route('user') }}">BACK</a>
            </div>
        </div>
        <!-- <detail-user-component></detail-user-component> -->
@endsection