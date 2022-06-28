<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::table('users')->insert([
            'email' => str_random(100).'testuser@kcsitglobal.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
