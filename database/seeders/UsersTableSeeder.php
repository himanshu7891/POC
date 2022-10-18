<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Admin;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'user_code'      => 'U001',
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'user_code'      => 'U002',
                'name'           => 'MS',
                'email'          => 'ms@ms.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
