@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Dashboard') }}<h2>                        
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Welcome {{ auth()->user()->full_name }} you are logged in!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection