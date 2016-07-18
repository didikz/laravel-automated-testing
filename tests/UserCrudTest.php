<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserCrudTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * user story: user is able to see user list
     * type: positive
     *
     * @return void
     */
    public function testAdministrator_is_able_to_see_user_list()
    {
        $user = factory(\App\User::class)->create();
        $this->actingAs($user)
            ->visit('/users')
            ->see($user->name);
    }

    /**
     * User Story: Functional test user is able to store users data
     * Type: positive
     *
     * @return void
     */
    public function testAdministrator_is_able_to_store_users_success()
    {
        $user = factory(\App\User::class)->create();
        $this->actingAs($user)
            ->visit('/users/create')
            ->type('Foo', 'name')
            ->type('foo@mail.com', 'email')
            ->type('secret', 'password')
            ->type('secret', 'password_confirmation')
            ->type('Dilo Malang', 'address')
            ->type('08771623', 'phone')
            ->press('Submit')
            ->seeInDatabase('users', ['name' => 'Foo', 'email' => 'foo@mail.com'])
            ->see('Data has been saved successfully');
    }

    /**
     *  User Story: user is able to update users data
     *  Type: Positive
     *
     * @return void
     */
    public function testAdministrator_is_able_to_update_users()
    {
        $user = factory(\App\User::class)->create();

        $existing = factory(\App\User::class)->create(['name' => 'Holaholo']);

        $this->actingAs($user)
            ->visit('/users/'.$existing->id.'/edit')
            ->see($existing->name)
            ->type('Foo bar', 'name')
            ->press('Submit')
            ->seeInDatabase('users', ['id' => $existing->id, 'name' => 'Foo bar'])
            ->see('Data has been updated successfully');
    }

    /**
     *  User Story: user is able to delete users data
     *  Type: positive
     *
     * @return void
     */
    public function testAdministrator_is_able_to_delete_users()
    {
//        $this->withoutMiddleware();
        $user = factory(\App\User::class)->create();

        $existing = factory(\App\User::class)->create();
        $this->actingAs($user);
        $response = $this->call('GET', '/users/'.$existing->id.'/delete');
        $this->dontSeeInDatabase('users', ['name' => $existing->name]);
    }
}
