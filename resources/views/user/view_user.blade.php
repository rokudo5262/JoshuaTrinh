@extends('layouts.admin')

@section('content')
    <user-component :user_id = "{{ auth()->user()->id }}" :users = "{{ json_encode($users) }}"></user-component>
@endsection
