<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewRegistrationPageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    /** @test */
    public function registration_page_loads_correctly()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee("Haven't got an account? Sign up here");
        $response->assertSee('Register');
    }  
}