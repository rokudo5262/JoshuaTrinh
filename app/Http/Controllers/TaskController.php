<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller {
    public function index() {
        $tasks = auth()->user()->statuses()->with('tasks')->get();
        return view('task.view_task', compact('tasks'));
    }
    public function create(Request $request) {
        return view('task.create_task', compact('tasks'));
    }
    public function store(Request $request) {
        $new_task = Task::create([
            'title'         => $request->get('title'),
            'description'   => $request->get('description'),
            'order'         => $request->get('order'),
            'user_id'       => $request->get('user_id'),
        ]);
        return $new_task;
    }
}
