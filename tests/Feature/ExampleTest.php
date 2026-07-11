<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_root_redirects_to_login(): void
    {
        $response = $this->get('/');

        $response->assertRedirect('/login');
    }

    public function test_login_page_loads(): void
    {
        $response = $this->get('/login');

        $response->assertOk();
        $response->assertSee('Sign in');
    }

    public function test_registration_page_loads(): void
    {
        $response = $this->get('/registration');

        $response->assertOk();
        $response->assertSee('Create account');
    }

    public function test_api_login_route_exists(): void
    {
        $response = $this->postJson('/api/login', []);

        $response->assertStatus(422);
    }
}
