<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Str;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller {
    public function __construct() {
        $this->middleware([
            'auth',
            'throttle:20,1',
            ]);
    }

    public function index() {
        $posts = Post::where('post_status','!=','1')->withCount('comment')->get();
        // $posts = Post::where('post_status','!=','1')->WithAuthor()->withCount('comment')->get();
        return view('post.view_post', compact('posts'));
    }

    public function create() {
        $users = User::where('is_deleted',0)->get();
        return view('post.create_post',[
            'users' => $users,
            ]);
    }

    public function store(CreatePostRequest $request) {
        $new_post = Post::create([
            'title'    => $request->get('title'),
            'slug'     => $this->slug($request->get('title')),
            'content'  => $request->get('content'),
            'post_status'   => $request->get('post_status'),
            'user_id'  => $request->get('author'),
        ]);
        return $new_post;
    }

    public function show($id) {
        $post = Post::findOrFail($id);
        return view("post.detail_post",compact('post'));;
    }

    public function edit($id) {
        $post = Post::findOrFail($id);
        return view('post.edit_post',compact('post'));
    }

    public function update(UpdatePostRequest $request, $id) {
        $post = Post::findOrFail($id);
        $post->update([
            'title'    => $request->get('title'),
            'slug'     => $this->slug($request->get('title')),
            'content'  => $request->get('content'),
            'post_status'   => $request->get('post_status'),
            'user_id'   => $request->get('author'),
        ]);
        return redirect()->route('post');
    }
        
    public function delete(Request $request,$id) {
        $post = Post::findOrFail($id);
        $post->update([
            'post_status' => 4,
        ]);
        return redirect()->route('post');
    }

    public function mutiple_delete(Request $request) {
        $delete_mutiple_posts = Post::whereIn('id',$request)->update([
            'post_status' => 4,
        ]);
        return $delete_mutiple_posts;
    }

    public function destroy($id) {
        $post = Post::findOrFail($id)->delete();
        return redirect()->route('post');
    }

    public function slug($title){
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $title)));
    }

}
