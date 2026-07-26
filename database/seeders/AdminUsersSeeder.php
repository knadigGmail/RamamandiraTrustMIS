<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUsersSeeder extends Seeder
{
    public function run(): void
    {
        $users = [

            [
                'name' => 'System Administrator',
                'email' => 'admin@ramamandira.org',
                'password' => 'Admin@123',
                'role' => 'Super Administrator',
            ],

            [
                'name' => 'Managing Trustee',
                'email' => 'managing@ramamandira.org',
                'password' => 'Admin@123',
                'role' => 'Managing Trustee',
            ],

            [
                'name' => 'Trustee',
                'email' => 'trustee@ramamandira.org',
                'password' => 'Admin@123',
                'role' => 'Trustee',
            ],

            [
                'name' => 'Accountant',
                'email' => 'accounts@ramamandira.org',
                'password' => 'Admin@123',
                'role' => 'Accountant',
            ],

            [
                'name' => 'Booking Clerk',
                'email' => 'booking@ramamandira.org',
                'password' => 'Admin@123',
                'role' => 'Booking Clerk',
            ],

            [
                'name' => 'Temple Manager',
                'email' => 'temple@ramamandira.org',
                'password' => 'Admin@123',
                'role' => 'Temple Manager',
            ],

        ];

        foreach ($users as $data) {

            $user = User::updateOrCreate(

                [
                    'email' => $data['email'],
                ],

                [
                    'name' => $data['name'],
                    'password' => Hash::make($data['password']),
                    'email_verified_at' => now(),
                ]

            );

            $user->syncRoles([$data['role']]);

        }
    }
}