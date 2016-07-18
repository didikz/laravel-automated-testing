<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthenticationTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A test to perform administrator is success attempt authentication
     *
     * @return void
     */
    public function testAdmin_do_authentication_success()
    {
        $user = factory(App\User::class)->create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('rahasia')
        ]);

        $this->visit('/')
            ->type('admin@admin.com', 'email')
            ->type('rahasia', 'password')
            ->press('Sign in')
            ->see('admin@admin.com');
    }

    /**
     * A test to perform administrator is failed to attempt authentication
     *
     * @return void
     */
    public function testAdmin_do_authentication_failed()
    {
        $this->visit('/')
            ->type('wrongemail@tes.com', 'email')
            ->type('somewrongpassword', 'password')
            ->press('Sign in')
            ->see('Email / password is incorrect');
    }

    /**
     * A test to perform user is should not access dashboard without login first
     *
     * @return void
     */
    public function testAdmin_shouldnot_access_dashboard_without_login()
    {
        $this->visit('/home')
            ->seePageIs('/')
            ->see('You have to login first');
    }
}
