<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder {
    public function run() {
        Post::insert([
            [
                'title'     => 'post 0',
                'content'   => 'post content 0',
                'slug'      => 'post_0',
                'user_id'   => '1',
            ],
            [
                'title'     => 'post 1',
                'content'   => 'post content 1',
                'slug'      => 'post_1',
                'user_id'   => '1',
            ],
            [
                'title'     => 'post 2',
                'content'   => 'post content 2',
                'slug'      => 'post_2',
                'user_id'   => '2',
            ],
            [
                'title'     => 'post 3',
                'content'   => 'post content 3',
                'slug'      => 'post_3',
                'user_id'   => '3',
            ],
            [
                'title'     => 'post 4',
                'content'   => 'post content 4',
                'slug'      => 'post_4',
                'user_id'   => '1',
            ],
            [
                'title'     => 'post 5',
                'content'   => 'post content 5',
                'slug'      => 'post_5',
                'user_id'   => '2',
            ],
            [
                'title'     => 'post 6',
                'content'   => 'post content 6',
                'slug'      => 'post_6',
                'user_id'   => '3',
            ],
            [
                'title'     => 'post 7',
                'content'   => 'post content 7',
                'slug'      => 'post_7',
                'user_id'   => '1',
            ],
            [
                'title'     => 'post 8',
                'content'   => 'post content 8',
                'slug'      => 'post_8',
                'user_id'   => '2',
            ],
            [
                'title'     => 'post 9',
                'content'   => 'post content 9',
                'slug'      => 'post_9',
                'user_id'   => '3',
            ],
            [
                'title'     => 'post 10',
                'content'   => 'post content 10',
                'slug'      => 'post_10',
                'user_id'   => '1',
            ],
            [
                'title'     => 'post 11',
                'content'   => 'post content 11',
                'slug'      => 'post_11',
                'user_id'   => '4',
            ],
            [
                'title'     => 'post 12',
                'content'   => 'post content 12',
                'slug'      => 'post_12',
                'user_id'   => '4',
            ],
        ]);
    }
}
