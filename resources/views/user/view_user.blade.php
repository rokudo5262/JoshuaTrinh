@extends('layouts.admin')

@section('content')
    <user-component :user_id = "{{ auth()->user()->id }}":users = "{{ json_encode($all_users) }}"></user-component>
@endsection
