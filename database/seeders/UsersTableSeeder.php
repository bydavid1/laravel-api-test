<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Juan',
                'username' => 'juan123',
                'email' => 'juan@example.com',
                'password' => Hash::make('password123'),
                'phone' => '1234567',
                'birthdate' => '1990-01-01',
            ],
            [
                'name' => 'Maria',
                'username' => 'maria123',
                'email' => 'maria@example.com',
                'password' => Hash::make('password123'),
                'phone' => '2345678',
                'birthdate' => '1992-05-10',
            ],
            [
                'name' => 'Pedro',
                'username' => 'pedro123',
                'email' => 'pedro@example.com',
                'password' => Hash::make('password123'),
                'phone' => '3456789',
                'birthdate' => '1985-12-31',
            ],
            [
                'name' => 'Lucia',
                'username' => 'lucia123',
                'email' => 'lucia@example.com',
                'password' => Hash::make('password123'),
                'phone' => '4567890',
                'birthdate' => '1994-07-15',
            ],
            [
                'name' => 'Jorge',
                'username' => 'jorge123',
                'email' => 'jorge@example.com',
                'password' => Hash::make('password123'),
                'phone' => '5678901',
                'birthdate' => '1998-11-21',
            ]
        ];

        User::insert($users);
    }
}
