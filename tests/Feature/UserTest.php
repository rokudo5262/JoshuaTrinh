<?php

namespace Tests\Feature;

use App\Models\User;
use Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase {

    public function test_api_get_all_user() {
        $response = $this->get('api/user');
        $response->assertStatus(200);
    }

    public function test_api_get_user() {
        $response = $this->get('api/user/1');
        $response->assertStatus(200);
    }
    
}
