<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder {
    public function run() {
        Comment::insert([
            [
                'post_id'     => '1',
                'user_id'   => '1',
                'content'      => 'Good Post',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'post_id'     => '1',
                'user_id'   => '2',
                'content'      => 'Normal Post',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'post_id'     => '1',
                'user_id'   => '3',
                'content'      => 'Bad Post',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'post_id'     => '2',
                'user_id'   => '1',
                'content'      => 'Good Post',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'post_id'     => '2',
                'user_id'   => '2',
                'content'      => 'Normal Post',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'post_id'     => '2',
                'user_id'   => '3',
                'content'      => 'Bad Post',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'post_id'     => '3',
                'user_id'   => '1',
                'content'      => 'Good Post',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'post_id'     => '3',
                'user_id'   => '2',
                'content'      => 'Normal Post',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'post_id'     => '3',
                'user_id'   => '3',
                'content'      => 'Bad Post',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
        ]);
    }
}
