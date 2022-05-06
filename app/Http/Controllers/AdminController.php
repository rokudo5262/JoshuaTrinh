<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Models\User;
use App\Models\Post;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller {
    public function login() {
        return view('login');
    }

    public function handle_login(Request $request) {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            Log::channel('login')->info($input['email']." at ".$request->getClientIp()." Login Success");
            return redirect()->route('dashboard');
        } else {
            Log::channel('login')->info($input['email']." at ".$request->getClientIp()." Login Fail");
            return redirect()->route('login');
        }
    }

    public function register() {
        return view('register');
    }

    public function handle_register(RegisterRequest $request) {
        $user = User::create([
            'first_name'    => $request->get('first_name'),
            'last_name'     => $request->get('last_name'),
            'email'         => $request->get('email'),
            'password'      => Hash::make($request->get('password')),
        ]);
        $user->assignRole('user');
        $message = [
            'function' => 'Register',
            'name' => $user->full_name,
            'content' => 'your register is a success',
        ];
        SendEmail::dispatch($message, $user)->register();
        return redirect()->back();
    }

    public function logout() {
        auth()->logout();
        return redirect()->route('login');
    }

    public function change_password() {
        return view('change_password');
    }

    public function forget_password() {
        return view('forget_password');
    }

    public function handle_change_password(ChangePasswordRequest $request) {
        $change_password = User::find(auth()->user()->id)->update([
            'password'=> Hash::make($request->get('new_password')),
        ]);
        if($change_password) {
            Log::channel('login')->info(auth()->user()->email." Change Password Succcessfully");
            $user = User::findOrFail(auth()->user()->id);
            $message = [
                'function' => 'Change Password',
                'name' => auth()->user()->full_name,
                'content' => 'your Password changed Succcessfully',
            ];
            SendEmail::dispatch($message, $user)->change_password();
        } else {
            Log::channel('login')->info(auth()->user()->email ." Change Password Fail");
        }
        return $change_password;     
    }

    public function profile() {
        return view('profile');
    }

    public function handle_change_profile_picture(Request $request) {
        $request->validate([
            'profile_picture' => 'required|image',
        ]);
        $files = $request->file('profile_picture');
        $name = $files->getClientOriginalName();
        $profile_picture = User::find(auth()->user()->id)->update(['profile_picture'=> $name]);
        $a = Storage::putFileAs('public/image/'.auth()->user()->id, $files,$name);
        return redirect()->route('user');
    }

    public function dashboard() {
        return view('dashboard');
    }

    public function generate_random_string($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characters_length = strlen($characters);
        $random_string = '';
        for ($i = 0; $i < $length; $i++) {
            $random_string .= $characters[rand(0, $characters_length - 1)];
        }
        return $random_string;
    }
    
    public function under_construction() {
        return view('under_construction');
    }

    public function setting() {
        //n+1 Query
        // $users = User::get();

        // Eager Load
        // $users = User::with('first_post')->get();

        // Dynamic Relationship
        $users = User::WithFirstPost()->get();
        $posts = Post::WithCount('comment')->get();
        return view('setting',compact('users','posts'));
    }

}
