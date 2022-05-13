<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller {
    public function index() {
        return Task::all();
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

    public function show($id) {
        return Task::find($id);
    }

    public function update(Request $request, $id) {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return $task;
    }

    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();
        return 204;
    }

    public function count_task() {
        $tasks = Task::get();
        return $tasks->count();
    }
}
