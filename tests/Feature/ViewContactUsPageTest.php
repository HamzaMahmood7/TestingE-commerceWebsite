<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewContactUsPageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    /** @test */
    public function contactus_page_loads_correctly()
    {
        $response = $this->get('/contactus');
        $response->assertStatus(200);
        $response->assertSee('Any problems? Get in touch');
        $response->assertSee('Name:');
        $response->assertSee('Message:');
    }  
}