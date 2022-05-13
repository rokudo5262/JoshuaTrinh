<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder {
    public function run() {
        $i = 1;
        while ( $i <= 2000) {
            Comment::insert([
                [
                    'id'=> $i,
                    'post_id'       => rand('1','1000'),
                    'user_id'       => rand('1','15'),
                    'content'       => 'This is Comment '.$i.' content',
                    'created_at'    => Carbon::now(),
                    'updated_at'    => Carbon::now(),
                ],
            ]);
            $i++;
        }
    }
}
