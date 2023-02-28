<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin User',
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'type' => 0,
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Kasir User',
                'username' => 'kasir',
                'email' => 'kasir@gmail.com',
                'type' => 1,
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Kantin User',
                'username' => 'kantin',
                'email' => 'kantin@gmail.com',
                'type' => 2,
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Tefa User',
                'username' => 'Tefa',
                'email' => 'tefa@gmail.com',
                'type' => 3,
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Dharmawanita User',
                'username' => 'dharmawanita',
                'email' => 'dharmawanita@gmail.com',
                'type' => 4,
                'password' => bcrypt('12345678'),
            ]
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
