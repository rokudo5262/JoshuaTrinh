<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller {
    public function __construct() {
        $this->middleware([
            'auth',
            'throttle:20,1',
            ]);
    }

    public function index() {
        // $posts = Post::with('user')->with('comment')->get
        $posts = Post::with('user')->withCount('comment')->get();
        return view('post.view_post',[
            'posts' => $posts,
        ]);
    }

    public function create() {
        return view('post.create_post');
    }

    public function store(Request $request) {
        //
    }

    public function show($id) {
        $post = Post::findOrFail($id);
        return view("post.detail_post",[
            'post' => $post,
        ]); 
    }

    public function edit($id) {
        return view('post.edit_post');
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }
}
