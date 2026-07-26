<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]
            ->forgetCachedPermissions();

        $permissions = [

            'dashboard.view',

            'trustee.view',
            'trustee.create',
            'trustee.edit',
            'trustee.delete',

            'donor.view',
            'donor.create',
            'donor.edit',
            'donor.delete',

            'booking.view',
            'booking.create',
            'booking.edit',
            'booking.delete',

            'receipt.view',
            'receipt.create',

            'payment.view',
            'payment.create',

            'user.view',
            'user.create',
            'user.edit',
            'user.delete',

            'role.manage',
            'permission.manage',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        $superAdmin = Role::firstOrCreate([
            'name' => 'Super Administrator',
            'guard_name' => 'web',
        ]);

        $managingTrustee = Role::firstOrCreate([
            'name' => 'Managing Trustee',
            'guard_name' => 'web',
        ]);

        $trustee = Role::firstOrCreate([
            'name' => 'Trustee',
            'guard_name' => 'web',
        ]);

        $accountant = Role::firstOrCreate([
            'name' => 'Accountant',
            'guard_name' => 'web',
        ]);

        $booking = Role::firstOrCreate([
            'name' => 'Booking Clerk',
            'guard_name' => 'web',
        ]);

        $temple = Role::firstOrCreate([
            'name' => 'Temple Manager',
            'guard_name' => 'web',
        ]);

        $superAdmin->givePermissionTo(Permission::all());

        $managingTrustee->givePermissionTo([
            'dashboard.view',
            'trustee.view',
            'trustee.create',
            'trustee.edit',
            'donor.view',
            'donor.create',
            'booking.view',
            'booking.create',
            'receipt.view',
            'payment.view',
        ]);

        $trustee->givePermissionTo([
            'dashboard.view',
            'trustee.view',
            'donor.view',
            'booking.view',
        ]);

        $accountant->givePermissionTo([
            'dashboard.view',
            'receipt.view',
            'receipt.create',
            'payment.view',
            'payment.create',
        ]);

        $booking->givePermissionTo([
            'dashboard.view',
            'booking.view',
            'booking.create',
            'booking.edit',
        ]);

        $temple->givePermissionTo([
            'dashboard.view',
        ]);
    }
    
}