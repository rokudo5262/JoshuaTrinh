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
    
    public function update(Request $request, $id) {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return $task;
    }

    public function sync(Request $request) {
        $this->validate(request(), [
            'columns' => ['required', 'array']
        ]);
        $a=[];
        foreach ($request->columns as $status) {
            foreach ($status['tasks'] as $i => $task) {
                $order = $i + 1;
                if ($task['status_id'] !== $status['id'] || $task['order'] !== $order) {
                    request()->user()->tasks()
                        ->find($task['id'])
                        ->update(['status_id' => $status['id'], 'order' => $order]);
                }
            }
        }
        return $request->user()->statuses()->with('tasks')->get();
    }
}
