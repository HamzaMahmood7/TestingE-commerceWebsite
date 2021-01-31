<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
     use DatabaseMigrations;

    /** @test */
    public function a_user_cannot_login_with_invalid_email_and_password()
    {
        $user = factory(User::class)->create([
            'email' => 'user@user.com',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->visit('/login')
                    ->assertSee('Already have an account? Log in here')
                    ->type('email', 'user@user.com')
                    ->type('password', 'wrong-password')
                    ->press('Login')
                    ->assertPathIs('/login')
                    ->assertSee('These credentials do not match our records.');
        });
    }

    /** @test */
    public function a_user_cannot_login_with_invalid_password()
    {
        $user = factory(User::class)->create([
            'email' => 'user@user.com',
        ]);
    
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->visit('/login')
                    ->assertSee('Already have an account? Log in here')
                    ->type('email', 'Johndoe@outlook.com')
                    ->type('password', 'wrong-password')
                    ->press('Login')
                    ->assertPathIs('/login')
                    ->assertSee('These credentials do not match our records.');
        });
    }

            /** @test */
    public function a_user_cannot_login_with_invalid_email()
    {
        $user = factory(User::class)->create([
            'email' => 'user@user.com',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->visit('/login')
                    ->assertSee('Already have an account? Log in here')
                    ->type('email', 'user@user.com')
                    ->type('password', 'johndoe123')
                    ->press('Login')
                    ->assertPathIs('/login')
                    ->assertSee('These credentials do not match our records.');
        });
    }

        /** @test */
        public function a_user_can_login_with_valid_email_and_password()
        {
            $user = factory(User::class)->create([
                'email' => 'user@user.com',
            ]);

            $this->browse(function (Browser $browser) {
                $browser->visit('/')
                        ->visit('/login')
                        ->assertSee('Already have an account? Log in here')
                        ->type('email', 'Johndoe@outlook.com')
                        ->type('password', 'johndoe123')
                        ->press('Login')
                        ->assertPathIs('/')
                        ->assertSee('Clean, sustainable and environmentally friendly');
            });
        }
}