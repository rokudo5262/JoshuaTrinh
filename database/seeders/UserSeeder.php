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
                'last_name'     => 'One',
                'is_admin'      => '1',
                'is_deleted'    => '0',
                'email'         => 'admin_1@gmail.com',
                'password'      => Hash::make('123456789'),
                'created_at'    => Cacbon::now(),
                'updated_at'    => Cacbon::now(),
            ],
            [
                'first_name'    =>'Admin',
                'last_name'     =>'Two',
                'is_admin'      => '1',
                'is_deleted'    => '0',
                'email'         => 'admin_2@gmail.com',
                'password'      => Hash::make('123456789'),
                'created_at'    => Cacbon::now(),
                'updated_at'    => Cacbon::now(),   
            ],
            [
                'first_name'    =>'User',
                'last_name'     =>'Three',
                'is_admin'      => '0',
                'is_deleted'    => '0',
                'email'         => 'user_3@gmail.com',
                'password'      => Hash::make('123456789'),
                'created_at'    => Cacbon::now(),
                'updated_at'    => Cacbon::now(),
            ],
            [
                'first_name'    => 'User',
                'last_name'     => 'Four',
                'is_admin'      => '0',
                'is_deleted'    => '0',
                'email'         => 'user_4@gmail.com',
                'password'      => Hash::make('123456789'),
                'created_at'    => Cacbon::now(),
                'updated_at'    => Cacbon::now(),
            ],
            [
                'first_name'    => 'User',
                'last_name'     => 'five',
                'is_admin'      => '0',
                'is_deleted'    => '0',
                'email'         => 'user_5@gmail.com',
                'password'      => Hash::make('123456789'),
                'created_at'    => Cacbon::now(),
                'updated_at'    => Cacbon::now(),
            ],
            [
                'first_name'    => 'User',
                'last_name'     => 'Six',
                'is_admin'      => '0',
                'is_deleted'    => '0',
                'email'         => 'user_6@gmail.com',
                'password'      => Hash::make('123456789'),
                'created_at'    => Cacbon::now(),
                'updated_at'    => Cacbon::now(),
            ],
            [
                'first_name'    => 'User',
                'last_name'     => 'Seven',
                'is_admin'      => '0',
                'is_deleted'    => '0',
                'email'         => 'user_7@gmail.com',
                'password'      => Hash::make('123456789'),
                'created_at'    => Cacbon::now(),
                'updated_at'    => Cacbon::now(),
            ],
            [
                'first_name'    => 'User',
                'last_name'     => 'Eight',
                'is_admin'      => '0',
                'is_deleted'    => '0',
                'email'         => 'user_8@gmail.com',
                'password'      => Hash::make('123456789'),
                'created_at'    => Cacbon::now(),
                'updated_at'    => Cacbon::now(),
            ],
            [
                'first_name'    => 'User',
                'last_name '    => 'Nine',
                'is_admin'      => '0',
                'is_deleted'    => '0',
                'email'         => 'user_9@gmail.com',
                'password'      => Hash::make('123456789'),
                'created_at'    => Cacbon::now(),
                'updated_at'    => Cacbon::now(),
            ],
            [
                'first_name'    => 'User',
                'last_name'     => 'Zero',
                'is_admin'      => '0',
                'is_deleted'    => '1',
                'email'         => 'user_0@gmail.com',
                'password'      => Hash::make('123456789'),
                'created_at'    => Cacbon::now(),
                'updated_at'    => Cacbon::now(),
            ],
            [
                'first_name'    => 'User',
                'last_name'     => 'Ten',
                'is_admin'      => '0',
                'is_deleted'    => '1',
                'email'         => 'user_10@gmail.com',
                'password'      => Hash::make('123456789'),
                'created_at'    => Cacbon::now(),
                'updated_at'    => Cacbon::now(),
            ],
        ]);
    }
}
