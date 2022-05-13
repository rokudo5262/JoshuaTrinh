<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 1;
        while ( $i <= 30) {
            Task::create([
                'id' => $i,
                'title' => 'Task '.$i,
                'description' => 'This is '.$i.' task description',
                'user_id' => rand(1,15),
                'status_id' => rand(1,5),
            ]);
            $i++;
        }
    }
}
