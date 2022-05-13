<?php

namespace Tests\Feature;

use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_api_get_all_comment() {
        $response = $this->get('api/comment');
        $response->assertStatus(200);
    }

    public function test_api_get_count_comment() {
        $response = $this->get('api/comment/count');
        $response->assertStatus(200);
    }
}
