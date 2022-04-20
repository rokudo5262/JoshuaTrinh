@extends('layouts.admin')

@section('content')
    <post-component :posts = "{{ json_encode($posts) }}"></post-component>
@endsection