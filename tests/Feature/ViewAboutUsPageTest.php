<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewAboutUsPageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    /** @test */
    public function aboutus_page_loads_correctly()
    {
        $response = $this->get('/aboutus');
        $response->assertStatus(200);
        $response->assertSee('About us');
        $response->assertSee('Our company');
        $response->assertSee('year.');
    }  
}