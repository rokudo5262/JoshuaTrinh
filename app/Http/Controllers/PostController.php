<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Str;

class PostController extends Controller {
    public function __construct() {
        $this->middleware([
            'auth',
            'throttle:20,1',
            ]);
    }

    public function index() {
        $posts = Post::where('status','!=','4')->with('user')->withCount('comment')->get();
        return view('post.view_post',[
            'posts' => $posts,
        ]);
    }

    public function create() {
        $users = User::where('is_deleted',0)->get();
        return view('post.create_post',[
            'users' => $users,
            ]);
    }

    public function store(Request $request) {
        $new_post = Post::create([
            'title'    => $request->get('title'),
            'slug'     => $this->slug($request->get('title')),
            'content'  => $request->get('content'),
            'status'   => $request->get('status'),
            'user_id'  => $request->get('author'),
        ]);
        return redirect()->route('post');
    }

    public function show($id) {
        $post = Post::findOrFail($id);
        return view("post.detail_post",[
            'post' => $post,
        ]); 
    }

    public function edit($id) {
        $post = Post::findOrFail($id);
        return view('post.edit_post',[
            'post' => $post,
        ]);
    }

    public function update(Request $request, $id) {
        $post = Post::findOrFail($id);
        $post->update([
            'title'    => $request->get('title'),
            'slug'     => $this->slug($request->get('title')),
            'content'  => $request->get('content'),
            'status'   => $request->get('status'),
            'user_id'   => $request->get('author'),
        ]);
        return redirect()->route('post');
    }
        
    public function delete(Request $request,$id) {
        $post = Post::findOrFail($id);
        $post->update([
            'status' => 4,
        ]);
        return redirect()->route('post');
    }

    public function destroy($id) {
        $post = Post::findOrFail($id)->delete();
        return redirect()->route('post');
    }

    public function slug($title){
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $title)));
    }

}
