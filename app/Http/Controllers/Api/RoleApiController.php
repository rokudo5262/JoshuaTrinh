<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\CreateUserRequest;


class RoleApiController extends Controller {
    public function index() {
        return Role::where('is_deleted',0)->get();
    }

    public function store(CreateRoleRequest $request) {
        $new_role = Role::create([
            'name' => $request->get('first_name'),
            'guard_name' => $request->get('guard_name'),
        ]);
        return $new_role;
    }

    public function show($id) {
        return Role::find($id);
    }

    public function update(Request $request, $id) {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        return $role;
    }
    
    public function delete(Request $request, $id) {
        $role = Role::findOrFail($id);
        $role->update([
            'is_deleted' => 1,
        ]);
        return $role;
    }

    public function destroy($id) {
        $role = Role::findOrFail($id);
        $role->delete();
        return 204;
    }

    public function count_role() {
        $roles = Role::where('is_deleted','0')->get();
        return $roles->count();
    }
}
