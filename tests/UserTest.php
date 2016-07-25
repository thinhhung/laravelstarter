<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UserTest extends TestCase
{
    /**
     * Test login success.
     *
     * @return void
     */
    public function testLoginSuccess()
    {
        $this->visit('/login')
            ->type('admin@site.com', 'email')
            ->type('admin', 'password')
            ->press('Login')
            ->see('Welcome');
    }

    /**
     * Test login error.
     *
     * @return void
     */
    public function testLoginError()
    {
        $this->visit('/login')
            ->type('admin@site.com', 'email')
            ->type('123456', 'password')
            ->press('Login')
            ->see(trans('auth.failed'));
    }

    /**
     * Test logout.
     *
     * @return void
     */
    public function testLogout()
    {
    	$user = factory(App\User::class)->create();
        $this->actingAs($user)
        	->visit('/')
            ->press($user->name)
            ->press('Logout')
            ->see('Welcome');
    }    
}
