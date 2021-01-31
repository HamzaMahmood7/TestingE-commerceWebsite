<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends DuskTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
     use DatabaseMigrations;
     use RefreshDatabase;

    /** @test */
    public function a_user_cannot_register_with_invalid_email_format()
    {
        $user = factory(User::class)->create([
            'email' => 'user@user.com',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->visit('/register')
                    ->assertSee("Haven't got an account? Sign up here")
                    ->type('name', 'Clark Kent')
                    ->type('email', 'useruser.com')
                    ->pause(1000)
                    ->type('password', 'football')
                    ->type('password_confirmation', 'football')
                    ->pause(1000)
                    ->press('Register')
                    ->assertPathIs('/register');
        });
    }

    /** @test */
    public function a_user_cannot_register_with_invalid_password_length()
    {
        $user = factory(User::class)->create([
            'email' => 'user@user.com',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->visit('/register')
                    ->assertSee("Haven't got an account? Sign up here")
                    ->type('name', 'Clark Kent')
                    ->type('email', 'user@user.com')
                    ->pause(1000)
                    ->type('password', 'ball')
                    ->type('password_confirmation', 'ball')
                    ->pause(1000)
                    ->press('Register')
                    ->assertPathIs('/register');
        });
    }

    /** @test */
    public function a_user_cannot_register_with_invalid_confirm_password()
    {
        $user = factory(User::class)->create([
            'email' => 'user@user.com',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->visit('/register')
                    ->assertSee("Haven't got an account? Sign up here")
                    ->type('name', 'Clark Kent')
                    ->type('email', 'user@user.com')
                    ->pause(1000)
                    ->type('password', 'football')
                    ->type('password_confirmation', 'ball')
                    ->pause(1000)
                    ->press('Register')
                    ->assertPathIs('/register');
        });
    }

    /** @test */
    public function a_user_can_register_with_valid_credentials()
    {
        $user = factory(User::class)->create([
            'email' => 'user@user.com',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->visit('/register')
                    ->assertSee("Haven't got an account? Sign up here")
                    ->type('name', 'Clark Kent')
                    ->type('email', 'user@user.com')
                    ->pause(1000)
                    ->type('password', 'football')
                    ->type('password_confirmation', 'football')
                    ->pause(1000)
                    ->press('Register')
                    ->assertPathIs('/');
        });
    }

}