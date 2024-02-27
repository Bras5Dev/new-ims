<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionsArray = [
            'create',
            'show',
            'edit',
            'delete',
        ];

        $permissions = collect($permissionsArray)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });

        Permission::insert($permissions->toArray());


        $adminrole = Role::findByName('admin');
        $adminrole->givePermissionTo(['create', 'show', 'edit', 'delete']);

        $accountrole = Role::findByName('account');
        $accountrole->givePermissionTo(['create', 'show', 'edit', 'delete']);

        $inventoryrole = Role::findByName('inventory');
        $inventoryrole->givePermissionTo(['create', 'show', 'edit', 'delete']);
    }
}
