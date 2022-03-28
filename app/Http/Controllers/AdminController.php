<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Rules\MatchOldPassword;

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
            return redirect()->route('user');
        }else{
            Log::channel('login')->info($input['email']." at ".$request->getClientIp()." Login Fail");
            return redirect()->route('login');
        }
    }

    public function register() {
        return view('register');
    }

    public function handle_register(Request $request) {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email'=>'required|email',
            'password'=>'required|min:9|max:100|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);
        User::create([
            'first_name'    => $request->get('first_name'),
            'last_name'     => $request->get('last_name'),
            'email'         => $request->get('email'),
            'password'      => Hash::make($request->get('password')),
        ]);
        return redirect('/register');
    }

    public function logout() {
        auth()->logout();
        return redirect('login');
    }

    public function change_password() {
        return view('change_password');
    }

    public function handle_change_password(Request $request) {
        $request->validate([
            'current_password'          => ['required', new MatchOldPassword],
            'new_password'              => 'required',
            'new_password_confirmation' => 'same:new_password',
        ]);
        $change_password = User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        if($change_password){
            Log::channel('login')->info(auth()->user()->email." Change Password Succcess");
        }else{
            Log::channel('login')->info(auth()->user()->email ." Change Password Fail");
        }
        return redirect('change_password');     
    }

    public function profile(){
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
        print_r($a);
    }

    public function home() {
        return view('home');
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
}
