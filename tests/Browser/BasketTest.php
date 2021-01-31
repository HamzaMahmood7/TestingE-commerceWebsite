<?php

namespace Tests\Browser;

use App\Product;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BasketTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_item_in_the_basket_can_update_quantity()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/products')
                    ->assertSee('HCOMP3639')
                    ->press('Add to basket')
                    ->assertPathIs('/basket')
                    ->type('quantity', '2')
                    ->pause(1000)
                    ->press('updateButton')
                    ->pause(1000)
                    ->assertSee('Sub Total: £47.98');

        });
    }

    public function an_item_in_the_basket_with_quantity_as_zero()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/products')
                    ->assertSee('HCOMP3639')
                    ->press('Add to basket')
                    ->assertPathIs('/basket')
                    ->type('quantity', '0')
                    ->pause(1000)
                    ->press('updateButton');
        });
    }

    /** @test */
    public function an_item_in_the_basket_can_be_removed()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/products')
                    ->assertSee('HCOMP3639')
                    ->press('Add to basket')
                    ->assertPathIs('/basket')
                    ->pause(1000)
                    ->press('removeButton')
                    ->pause(1000)
                    ->assertSee('No Product(s) In Your Basket');
        });
    }

}