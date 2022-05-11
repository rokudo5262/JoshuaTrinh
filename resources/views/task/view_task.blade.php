@extends('layouts.admin')

@section('content')
<div class="">
    <div class="">
        <!-- Our Kanban Vue component will go here -->
        <kanban-board :initial-data="{{ $tasks }}"></kanban-board>

    </div>
</div>
@endsection