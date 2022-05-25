<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase {
    public function test_api_get_all_post() {
        $response = $this->get('api/post');
        $response->assertStatus(200);
    }

    public function test_api_get_count_post() {
        $response = $this->get('api/post/count');
        $response->assertStatus(200);
    }

    public function test_api_get_post_by_id() {
        $response = $this->get('api/post/1');
        $response->assertStatus(200);
    }

    // public function test_a_user_can_read_all_the_post() {
    //     //Given we have task in the database
    //     $post = factory('App\Models\Post')->create();

    //     //When user visit the tasks page
    //     $response = $this->get('api/post');
        
    //     //He should be able to read the task
    //     $response->assertSee($post->title);
    // }
}
