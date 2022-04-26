<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder {
    public function run() {
        Post::insert([
            [
                'id'        => '1',
                'title'     => 'post 1',
                'content'   => 'post content 1',
                'slug'      => 'post_1',
                'user_id'   => '1',
            ],
            [
                'id'        => '2',
                'title'     => 'post 2',
                'content'   => 'post content 2',
                'slug'      => 'post_2',
                'user_id'   => '2',
            ],
            [
                'id'        => '3',
                'title'     => 'post 3',
                'content'   => 'post content 3',
                'slug'      => 'post_3',
                'user_id'   => '3',
            ],
            [
                'id'        => '4',
                'title'     => 'post 4',
                'content'   => 'post content 4',
                'slug'      => 'post_4',
                'user_id'   => '1',
            ],
            [
                'id'        => '5',
                'title'     => 'post 5',
                'content'   => 'post content 5',
                'slug'      => 'post_5',
                'user_id'   => '2',
            ],
            [
                'id'        => '6',
                'title'     => 'post 6',
                'content'   => 'post content 6',
                'slug'      => 'post_6',
                'user_id'   => '3',
            ],
            [
                'id'        => '7',
                'title'     => 'post 7',
                'content'   => 'post content 7',
                'slug'      => 'post_7',
                'user_id'   => '1',
            ],
            [
                'id'        => '8',
                'title'     => 'post 8',
                'content'   => 'post content 8',
                'slug'      => 'post_8',
                'user_id'   => '2',
            ],
            [
                'id'        => '9',
                'title'     => 'post 9',
                'content'   => 'post content 9',
                'slug'      => 'post_9',
                'user_id'   => '3',
            ],
            [
                'id'        => '10',
                'title'     => 'post 10',
                'content'   => 'post content 10',
                'slug'      => 'post_10',
                'user_id'   => '1',
            ],
            [
                'id'        => '11',
                'title'     => 'post 11',
                'content'   => 'post content 11',
                'slug'      => 'post_11',
                'user_id'   => '4',
            ],
            [
                'id'        => '12',
                'title'     => 'post 12',
                'content'   => 'post content 12',
                'slug'      => 'post_12',
                'user_id'   => '4',
            ],
            [
                'id'        => '13',
                'title'     => 'post 13',
                'content'   => 'post content 13',
                'slug'      => 'post_13',
                'user_id'   => '4',
            ],
            [
                'id'        => '14',
                'title'     => 'post 14',
                'content'   => 'post content 14',
                'slug'      => 'post_14',
                'user_id'   => '4',
            ],
            [
                'id'        => '15',
                'title'     => 'post 15',
                'content'   => 'post content 15',
                'slug'      => 'post_15',
                'user_id'   => '4',
            ],
        ]);
    }
}
