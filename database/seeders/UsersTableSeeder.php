<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'milton2913@gmail.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'verified'           => 1,
                'verified_at'        => '2021-01-19 07:48:34',
                'verification_token' => '',
                'approved'           => 1,
                'diu_id'           => 1111111111,
            ],
            [
                'id'             => 2,
                'name'           => 'User',
                'email'          => 'user@localhost.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'verified'           => 1,
                'verified_at'        => '2021-01-19 07:48:34',
                'verification_token' => '',
                'approved'           => 1,
                'diu_id'           => 222222222,
            ],
        ];

        User::insert($users);
    }
}
