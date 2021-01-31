<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewInfoPageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    /** @test */
    public function info_page_loads_correctly()
    {
        $response = $this->get('/info');
        $response->assertStatus(200);
        $response->assertSee('Information about Biopack');
        $response->assertSee('The Global Bag:');
        $response->assertSee('oxygen.');
    }  
}