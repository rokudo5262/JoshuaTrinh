@extends('layouts.admin')

@section('content')
<update-post-component :postid="{{ $post->id }}"></update-post-component>
@endsection