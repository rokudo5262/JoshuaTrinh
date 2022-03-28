<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
                'first_name'=>'Joshua',
                'last_name'=>'Trinh',
                'email'=>'rokudo5262@gmail.com',
                'password'=>Hash::make('123456789'),
            ],
            [
                'first_name'=>'Admin',
                'last_name'=>'1',
                'email'=>'admin1@gmail.com',
                'password'=>Hash::make('123456789'),
            ],
            [
                'first_name'=>'Admin',
                'last_name'=>'2',
                'email'=>'admin2@gmail.com',
                'password'=>Hash::make('123456789'),
            ],
        ]);
    }
}
