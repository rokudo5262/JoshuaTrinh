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
            'all_users' => $result,
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
        // $validated = $request->validate([
        //     'email'=>'required|email',
        //     'password'=>'required|min:9|max:100',
        // ]);
        if($request->ajax()) {
            $new_user = User::create([
                // 'profile_picture' => $request->get('profile_picture'),
                'first_name'    => Str::ucfirst($request->get('first_name')),
                'last_name'     => Str::ucfirst($request->get('last_name')),
                'email'         => $request->get('email'),
                'password'      => Hash::make($request->get('password')),
            ]);
            $new_user->assignRole('user');
            // $files = $request->file('profile_picture');
            // $name = $files->getClientOriginalName();
            // Storage::putFileAs('public/image/'.$new_user->id, $files,$name);
            // return redirect('/user');
            return response()->json(['success'=>'Data is successfully added']);
        } else {
            return response()->json(['error'=>'Error']);
        }  
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
        return view("user.edit_user",[
            'user' => $user
        ]);
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
        $ids = $request->ids;
        User::whereIn('id',explode(",",$ids))->update([
            'is_deleted' => 1,
        ]);
        return response()->json(['success'=>"User Deleted successfully."]);
    }

    public function destroy($id) {
            $user = User::findOrFail($id);
            $user -> delete();
            return redirect("/user");
    }

    public function search(Request $request) {
        // $user = User::where('is_deleted',0)->get();
        // if ($request->input('search')) {
        // if ($request->ajax()) {
        //     $user = User::where('is_deleted',0)
        //     ->where('first_name', 'LIKE', "%{$request->input('search')}%")
        //     ->orWhere('last_name', 'LIKE', "%{$request->input('search')}%")
        //     ->orWhere('email', 'LIKE', "%{$request->input('search')}%")->get();
        //     return response()->json($user);
        // }
        // $results = $user->sortByDesc('first_name');
        // return view("user.search_user",compact('results'));
        return view("user.search_user");

    }

    public function handle_search(Request $request) {
        $output="";
        if ($request->ajax()) {
            $search = $request->input('search');
            $users = User::where('is_deleted','0')->where(function ($query) use ($search) {
                $query->where('first_name', 'LIKE', "%$search%") 
                    ->orWhere('last_name', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%");
                })->get();
            if($users) {
                foreach ($users as $key => $user) {
                    $output.='<tr>'.
                    '<td><input type="checkbox" id="'.$user->id.'" value="'.$user->id.'"/></td>'.
                    '<td>'.$user->first_name.'</td>'.
                    '<td>'.$user->last_name.'</td>'.
                    '<td>'.$user->email.'</td>'.
                    '<td>'.$user->is_deleted.'</td>'.
                    '</tr>';
                }
            }
        }
        return Response($output);
    }

    public function test() {
        $user = User::findOrFail('4');
        $result = $user->assignRole('writer');
        $a='';
        if($result){
            $a = "true" ;
        }else {
            $a = "false";
        }
        echo($a);
    }
}
