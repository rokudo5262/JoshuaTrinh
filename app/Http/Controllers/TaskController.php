<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller {
    public function index() {
        $tasks = auth()->user()->statuses()->with('tasks')->get();
        return view('task.view_task', compact('tasks'));
    }

}
