<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserLogin extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->post(route('login'), ['email' => 'admin@gmail.com', 'password' => 'password']);
        $response->assertLocation(route('home'));
    }
}
