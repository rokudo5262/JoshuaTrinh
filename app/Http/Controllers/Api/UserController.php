<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller {
    public function index() {
        return User::where('is_deleted',0)->get();
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email'=>'required|email',
            'password'=>'required|min:9|max:100',
        ]);
        return User::create($request->all());
    }

    public function show($id) {
        return User::find($id);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email'=>'required|email',
            'password'=>'required|min:9|max:100',
        ]);
        $user = User::findOrFail($id);
        $user->update([
            'first_name' => Str::ucfirst($request->get('first_name')),
            'last_name' => Str::ucfirst($request->get('last_name')),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'phone_number' => $request->get('phone_number'),
            'date_of_birth' => Carbon::createFromFormat('Y-m-d H:i:s',$request->get('date_of_birth')),
        ]);
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
        $users =  User::where('is_deleted','=',0)->get();
        return $users->count();
    }
}
