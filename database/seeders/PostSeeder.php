<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Carbon\Carbon;

class PostSeeder extends Seeder {
    public function run() {
        $i = 17;
        while ( $i <= 1000) {
            Post::insert([
                [
                    'id'            => $i,
                    'user_id'       => rand('1','15'),
                    'title'         => 'post '.$i,
                    'slug'          => 'post_'.$i,
                    'content'       => 'This is Comment '.$i.' content',
                    'post_status'   => '0',
                    'created_at'    => Carbon::now(),
                    'updated_at'    => Carbon::now(),
                ],
            ]);
            $i++;
        }
    }
}