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

    public function index(Request $request) {
        $users = User::where('is_deleted',0);
        if ($request->input('search')) {
            $search = $request->input('search');
            $users->where(function ($query) use ($search){
                $query->where('first_name', 'LIKE', "%$search%") 
                    ->orWhere('last_name', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%");
                });
        }
        $result = $users->get();
        return view('user.view_user', [
            'users' => $result,
        ]);
    }

    public function create() {
        return view('user.create_user');
    }

    public function store(Request $request) {
        $new_user = User::create([
            'profile_picture' => $request->get('profile_picture'),
            'first_name'    => Str::ucfirst($request->get('first_name')),
            'last_name'     => Str::ucfirst($request->get('last_name')),
            'email'         => $request->get('email'),
            'password'      => Hash::make($request->get('password')),
        ]);
        $new_user->assignRole('user');
        $files = $request->file('profile_picture');
        $name = $files->getClientOriginalName();
        Storage::putFileAs('public/image/'.$new_user->id, $files,$name);
        return redirect('/user');
    }

    public function show($id) {
        $user = User::findOrFail($id);
        $posts = $user->post()->where('status','!=','4')->get();
        return view("user.detail_user",[
            'user' => $user,
            'posts' => $posts,
        ]);

    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view("user.edit_user",[
            'user' => $user
        ]);
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->update([
            'first_name' => Str::ucfirst($request->get('first_name')),
            'last_name' => Str::ucfirst($request->get('last_name')),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        return redirect()->route('user');
    }

    public function delete(Request $request,$id) {
        $user = User::findOrFail($id);
        $user->update([
            'is_deleted' => 1,
        ]);
        return redirect()->route('user');
    }

    public function undo_delete(Request $request,$id) {
        $user = User::findOrFail($id);
        $user->update([
            'is_deleted' => 0,
        ]);
        return redirect()->route('user');
    }

    public function mutiple_delete(Request $request) {
        $ids = $request->ids;
        User::whereIn('id',explode(",",$ids))->update([
            'is_deleted' => 1,
        ]);
        return response()->json(['success'=>"User Deleted successfully."]);
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user -> delete();
        return redirect()->route('user');;
    }
}
