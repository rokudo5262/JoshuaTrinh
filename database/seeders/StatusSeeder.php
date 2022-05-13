<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::insert([
            [
                'title' => 'Backlog',
                'slug' => 'backlog',
                'user_id' => '1',
                'order' => 1
            ],
            [
                'title' => 'Up Next',
                'slug' => 'up-next',
                'user_id' => '1',
                'order' => 2
            ],
            [
                'title' => 'In Progress',
                'slug' => 'in-progress',
                'user_id' => '1',
                'order' => 3
            ],
            [
                'title' => 'Testing',
                'slug' => 'testing',
                'user_id' => '1',
                'order' => 4
            ],
            [
                'title' => 'Done',
                'slug' => 'done',
                'user_id' => '1',
                'order' => 5
            ]
        ]);
    }
}
