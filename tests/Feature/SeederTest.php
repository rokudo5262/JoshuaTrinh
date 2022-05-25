<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\UserSeeder;

class SeederTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_if_all_seeders_work()
    {
        $this->seed();
    }
    public function test_if_user_seeder_work()
    {
        $this->seed(UserSeeder::class);
    }
}
