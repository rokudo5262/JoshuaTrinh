<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        User::insert([
            [
                'first_name'    => 'Joshua',
                'last_name'     => 'Trinh',
                'is_admin'      => '1',
                'is_deleted'    => '0',
                'email'         => ' rokudo5262@gmail.com',
                'password'      => Hash::make('123456789'),
                'created_at'    => Cacbon::now(),
                'updated_at'    => Cacbon::now(),
            ],
            [
                'first_name'    => 'Admin',
                'last_name'     => 'one',
                'is_admin'      => '1',
                'is_deleted'    => '0',
                'email'         => 'admin_1@gmail.com',
                'password'      => Hash::make('123456789'),
                'created_at'    => Cacbon::now(),
                'updated_at'    => Cacbon::now(),
            ],
            [
                'first_name'=>'Admin',
                'last_name'=>'two',
                'is_admin' => '1',
                'is_deleted' => '0',
                'email'=>'admin_2@gmail.com',
                'password'=>Hash::make('123456789'),
                'created_at'    => Cacbon::now(),
                'updated_at'    => Cacbon::now(),   
            ],
            [
                'first_name'=>'user',
                'last_name'=>'three',
                'is_admin' => '0',
                'is_deleted' => '0',
                'email'=>'user_3@gmail.com',
                'password'=>Hash::make('123456789'),
                'created_at'    => Cacbon::now(),
                'updated_at'    => Cacbon::now(),
            ],
            [
                'first_name'=>'user',
                'last_name'=>'four',
                'is_admin' => '0',
                'is_deleted' => '0',
                'email'=>'user_4@gmail.com',
                'password'=>Hash::make('123456789'),
                'created_at'    => Cacbon::now(),
                'updated_at'    => Cacbon::now(),
            ],
            [
                'first_name'=>'user',
                'last_name'=>'five',
                'is_admin' => '0',
                'is_deleted' => '0',
                'email'=>'user_5@gmail.com',
                'password'=>Hash::make('123456789'),
                'created_at'    => Cacbon::now(),
                'updated_at'    => Cacbon::now(),
            ],
            [
                'first_name'=>'user',
                'last_name'=>'six',
                'is_admin' => '0',
                'is_deleted' => '0',
                'email'=>'user_6@gmail.com',
                'password'=>Hash::make('123456789'),
                'created_at'    => Cacbon::now(),
                'updated_at'    => Cacbon::now(),
            ],
            [
                'first_name'=>'user',
                'last_name'=>'seven',
                'is_admin' => '0',
                'is_deleted' => '0',
                'email'=>'user_7@gmail.com',
                'password'=>Hash::make('123456789'),
                'created_at'    => Cacbon::now(),
                'updated_at'    => Cacbon::now(),
            ],
            [
                'first_name'=>'user',
                'last_name'=>'eight',
                'is_admin' => '0',
                'is_deleted' => '0',
                'email'=>'user_8@gmail.com',
                'password'=>Hash::make('123456789'),
                'created_at'    => Cacbon::now(),
                'updated_at'    => Cacbon::now(),
            ],
            [
                'first_name'=>'user',
                'last_name'=>'nine',
                'is_admin' => '0',
                'is_deleted' => '0',
                'email'=>'user_9@gmail.com',
                'password'=>Hash::make('123456789'),
                'created_at'    => Cacbon::now(),
                'updated_at'    => Cacbon::now(),
            ],
            [
                'first_name'=>'user',
                'last_name'=>'zero',
                'is_admin' => '0',
                'is_deleted' => '1',
                'email'=>'user_0@gmail.com',
                'password'=>Hash::make('123456789'),
                'created_at'    => Cacbon::now(),
                'updated_at'    => Cacbon::now(),
            ],
        ]);
    }
}
