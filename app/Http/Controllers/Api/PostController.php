<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller {
    public function index() {
        return Post::all();
    }

    public function store(Request $request) {
        return Post::create($request->all());
    }

    public function show($id)
    {
        return Post::find($id);
    }

    public function update(Request $request, $id) {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return $post;
    }

    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();
        return 204;
    }
}
