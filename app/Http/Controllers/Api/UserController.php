<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\CreateUserRequest;


class UserController extends Controller {
    public function index() {
        return User::where('is_deleted',0)->withFirstPost()->withCount('posts')->get();
    }

    public function store(CreateUserRequest $request) {
        $new_user = User::create([
            'first_name'    => Str::ucfirst($request->get('first_name')),
            'last_name'     => Str::ucfirst($request->get('last_name')),
            'email'         => $request->get('email'),
            'password'      => Hash::make($request->get('password')),
        ]);
        $new_user->assignRole('user');
        return $new_user;    }

    public function show($id) {
        return User::find($id);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email'=>'required|email',
        ]);
        $user = User::findOrFail($id);
        $user->update($request->all());
        return $user;
    }
    
    public function delete(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->update([
            'is_deleted' => 1,
        ]);
        return $user;
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return 204;
    }

    public function count_user() {
        $users = User::where('is_deleted','0')->get();
        return $users->count();
    }
}
