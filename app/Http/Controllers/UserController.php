<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller {
    public function __construct() {
        $this->middleware([
            'auth',
            'throttle:20,1',
            ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::where('is_deleted',0)->get();
        $user_deleted = User::where('is_deleted',1)->get();
        return view('user.view_user', [
            'all_users' => $users,
            'all_deleted_users' => $user_deleted,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('user.create_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:9|max:100',
        ]);
        $new_user = User::create([
            'profile_picture' => $request->get('profile_picture'),
            'first_name' => Str::ucfirst($request->get('first_name')),
            'last_name' => Str::ucfirst($request->get('last_name')),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        $files = $request->file('profile_picture');
        $name = $files->getClientOriginalName();
        Storage::putFileAs('public/image/'.$new_user->id, $files,$name);
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::findOrFail($id);
        $posts = $user->post()->get();
        // $posts = Post::where("user_id", "=", $user->id)->get();
        return view("user.detail_user",[
            'user' => $user,
            'posts' => $posts,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::findOrFail($id);
        return view("user.edit_user",['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->update([
            'first_name' => Str::ucfirst($request->get('first_name')),
            'last_name' => Str::ucfirst($request->get('last_name')),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id) {
        $user = User::findOrFail($id);
        $user->update([
            'is_deleted' => 1,
        ]);
        return redirect("/user");
    }

    public function undo_delete(Request $request,$id) {
        $user = User::findOrFail($id);
        $user->update([
            'is_deleted' => 0,
        ]);
        return redirect("/user");
    }

    public function mutiple_delete(Request $request) {
        // $ids = $request->ids;
        $ids = '6,7,8';
        User::whereIn('id',explode(",",$ids))->update([
            'is_deleted' => 1,
        ]);
        // return response()->json(['success'=>"Products Deleted successfully."]);
        return redirect("/user");
    }

    public function destroy($id) {
            $user = User::findOrFail($id);
            $user -> delete();
            return redirect("/user");
    }

    public function search(Request $request) {
        return view("user.search_user");
    }
}
