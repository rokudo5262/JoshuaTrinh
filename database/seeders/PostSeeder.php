<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run() {
        Post::insert([
            [
                'title'=>'post 1',
                'content'=>'post 1',
                'slug'=>'post_1',
                'user_id'=>'1',
            ],
            [
                'title'=>'post 2',
                'content'=>'post 2',
                'slug'=>'post_2',
                'user_id'=>'2',
            ],            [
                'title'=>'post 3',
                'content'=>'post 3',
                'slug'=>'post_3',
                'user_id'=>'3',
            ],            [
                'title'=>'post 4',
                'content'=>'post 4',
                'slug'=>'post_4',
                'user_id'=>'1',
            ],
            [
                'title'=>'post 5',
                'content'=>'post 5',
                'slug'=>'post_5',
                'user_id'=>'2',
            ],            
            [
                'title'=>'post 6',
                'content'=>'post 6',
                'slug'=>'post_6',
                'user_id'=>'3',
            ],
            [
                'title'=>'post 7',
                'content'=>'post 7',
                'slug'=>'post_7',
                'user_id'=>'1',
            ],
            [
                'title'=>'post 8',
                'content'=>'post 8',
                'slug'=>'post_8',
                'user_id'=>'2',
            ],            [
                'title'=>'post 9',
                'content'=>'post 9',
                'slug'=>'post_9',
                'user_id'=>'3',
            ],
        ]);
    }
}
