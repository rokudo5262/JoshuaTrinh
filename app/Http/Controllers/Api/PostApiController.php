<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostApiController extends Controller {
    public function index() {
        return Post::withAuthor()->withCount('comment')->where('post_status','=!','4')->get();
    }

    public function store(Request $request) {
        return Post::create([
            'title' => $request->get('title'),
            'slug' => $request->get('title'),
            'content' => $request->get('content'),
            'user_id' => $request->get('author'),
            'post_status' => $request->get('post_status'),
        ]);
    }

    public function show($id) {
        return Post::find($id);
    }

    public function update(Request $request, $id) {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return $post;
    }

    public function delete(Request $request, $id) {
        $post = Post::findOrFail($id);
        $post->update([
            'post_status' => 4,
        ]);
        return $post;
    }

    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();
        return 204;
    }

    public function count_post() {
        $post_count = Post::count();
        return $post_count;
    }
}
