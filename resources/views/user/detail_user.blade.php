@extends('layouts.admin')

@section('content')
        <detail-user-component 
            :user = "{{ json_encode($user) }}"
            :posts = "{{ json_encode($posts) }}"
            >
        </detail-user-component>
@endsection