<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $roles = [
            ['name' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'account',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'inventory',   'created_at' => now(), 'updated_at' => now()],
            // Add more roles as needed
        ];

        // Insert roles into the 'roles' table
        foreach ($roles as $role) {
            Role::create($role);
        }

        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@mau.com',
                'phone_number' => '9800000000',
                'type' => 'staff_member',
                'status' => 'active',
                'password' => '$2y$10$NhPjTUWqCHE7.j7eZCEJseWZ8ZHmHBzwqNb6QNK/4z7VcNim7uVhK',
            ],
            [
                'name' => 'Account',
                'email' => 'account@mau.com',
                'phone_number' => '9800000001',
                'type' => 'staff_member',
                'status' => 'active',
                'password' => '$2y$10$NhPjTUWqCHE7.j7eZCEJseWZ8ZHmHBzwqNb6QNK/4z7VcNim7uVhK',
            ],
            [
                'name' => 'Inventory',
                'email' => 'inventory@mau.com',
                'phone_number' => '9800000002',
                'type' => 'staff_member',
                'status' => 'active',
                'password' => '$2y$10$NhPjTUWqCHE7.j7eZCEJseWZ8ZHmHBzwqNb6QNK/4z7VcNim7uVhK',
            ],
        ];

        foreach ($users as $key => $user) {
            $createdUser = User::create($user);

            if ($key === 0) {
                // Assign 'sadmin' role to the first user
                $createdUser->assignRole('admin');
            } elseif ($key === 1) {
                // Assign 'admin' role to the second user
                $createdUser->assignRole('account');
            } elseif ($key === 2) {
                $createdUser->assignRole('inventory');
            }
        }
    }
}
