<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentApiController extends Controller {
    public function index() {
        return Comment::all();
    }

    public function store(Request $request) {
        return Comment::create($request->all());
    }

    public function show($id) {
        return Comment::find($id);
    }

    public function update(Request $request, $id) {
        $comment = Comment::findOrFail($id);
        $comment->update($request->all());
        return $comment;
    }

    public function destroy($id) {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return 204;
    }

    public function count_comment() {
        $comments = Comment::get();
        return $comments->count();
    }
}
