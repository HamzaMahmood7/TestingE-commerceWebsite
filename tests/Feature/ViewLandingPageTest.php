<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewLandingPageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    /** @test */
    public function landing_page_loads_correctly()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Clean, sustainable and environmentally friendly');
    }  
}
