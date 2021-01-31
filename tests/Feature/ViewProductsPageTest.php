<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewProductsPageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    /** @test */
    public function products_page_loads_correctly()
    {
        $response = $this->get('/products');
        $response->assertStatus(200);
        $response->assertSee('Catergories');
    }  
    
    public function products_are_visible(){
        $response->assertSee('Catergories');
        $response->assertSee('HCOMP3639');
        $response->assertSee('Price: £29.49');
    }
}
