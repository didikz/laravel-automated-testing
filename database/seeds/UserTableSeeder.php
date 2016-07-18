<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::truncate();

        factory(\App\User::class)->create([
            'email' => 'admin@testing.com',
            'password' => bcrypt('rahasia')
        ]);
    }
}
