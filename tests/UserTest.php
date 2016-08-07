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
        $user = factory(App\User::class)->create([
            'password' => bcrypt('123456'),
        ]);
        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('123456', 'password')
            ->press('Login')
            ->see($user->name);
    }

    /**
     * Test login error.
     *
     * @return void
     */
    public function testLoginError()
    {
        $user = factory(App\User::class)->create([
            'password' => bcrypt('123456'),
        ]);
        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('12345678', 'password')
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
