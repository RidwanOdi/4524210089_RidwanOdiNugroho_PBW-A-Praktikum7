<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Admin User',  'email' => 'admin@example.com',  'role' => User::ROLE_ADMIN],
            ['name' => 'Staff User',  'email' => 'staff@example.com',  'role' => User::ROLE_STAFF],
            ['name' => 'Viewer User', 'email' => 'viewer@example.com', 'role' => User::ROLE_VIEWER],
        ];

        foreach ($users as $data) {
            // Password: "password" (di-hash otomatis oleh cast 'hashed')
            User::updateOrCreate(
                ['email' => $data['email']],
                ['name' => $data['name'], 'role' => $data['role'], 'password' => 'password'],
            );
        }
    }
}
