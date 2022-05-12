@extends('layouts.admin')

@section('content')
        <detail-user-component :user = "{{ json_encode($user) }}"></detail-user-component>
@endsection