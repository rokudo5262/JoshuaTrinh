<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder {
    public function run() {
        $role_user = Role::create(['name' => 'user']);
        $role_user->givePermissionTo('view user');
        $role_user->givePermissionTo('view post');

        $role_writer = Role::create(['name' => 'writer']);
        $role_writer->givePermissionTo('edit post');
        $role_writer->givePermissionTo('delete post');
        
        $role_admin = Role::create(['name' => 'admin']);
        $role_admin->givePermissionTo('create user');
        $role_admin->givePermissionTo('edit user');
        $role_admin->givePermissionTo('delete post');
        $role_admin->givePermissionTo('create post');
        $role_admin->givePermissionTo('delete user');
        
        $role_super_admin = Role::create(['name' => 'super_admin']);

    }
}
