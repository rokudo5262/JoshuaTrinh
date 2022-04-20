@extends('layouts.admin')

@section('content')
<update-user-component :user = "{{ json_encode($user) }}"></update-user-component>
@endsection