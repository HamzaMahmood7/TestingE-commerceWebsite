<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewBasketPageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    /** @test */
    public function basket_page_loads_correctly()
    {
        $response = $this->get('/basket');
        $response->assertStatus(200);
        $response->assertSee('Ready to checkout?');
        $response->assertSee('No Product(s) In Your Basket');
        $response->assertSee('Continue Shopping');
    }  
}