<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::all()->keyBy('name');
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => env('DEFAULT_ADMIN', 'password'),
                'role' => 'admin',
            ],
            [
                'name' => 'Lecture User',
                'email' => 'lecture@example.com',
                'password' => env('DEFAULT_LECTURE', 'password'),
                'role' => 'lecture',
            ],
            [
                'name' => 'Student User',
                'email' => 'student@example.com',
                'password' => env('DEFAULT_STUDENT', 'password'),
                'role' => 'student',
            ],
        ];
        foreach ($users as $userData) {
            $user = User::firstOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => $userData['password'],
                ]
            );
            $user->assignRole($roles[$userData['role']]);
        }
    }
}
