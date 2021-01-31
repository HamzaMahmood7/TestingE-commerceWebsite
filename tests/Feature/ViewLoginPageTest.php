<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewLoginPageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    /** @test */
    public function login_page_loads_correctly()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertSee('Already have an account? Log in here');
        $response->assertSee('Forgot Your Password?');
    }  
}
