@extends('layouts.admin')

@section('content')
    <task-kanban-board :initial-data="{{ $tasks }}"></task-kanban-board>
@endsection