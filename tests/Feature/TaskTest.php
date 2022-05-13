<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_api_get_all_task() {
        $response = $this->get('api/task');
        $response->assertStatus(200);
    }

    public function test_api_get_count_task() {
        $response = $this->get('api/task/count');
        $response->assertStatus(200);
    }
}
