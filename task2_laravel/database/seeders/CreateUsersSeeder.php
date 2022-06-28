<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'testuser@kcsitglobal.com',
                'type' => '1',
                'password' => bcrypt('secret'),
            ],
            [
                'name' => 'User',
                'email' => 'jaypal@gmail.com',
                'type' => '0',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($user as $value) {
            User::create($value);
        }
    }
}
