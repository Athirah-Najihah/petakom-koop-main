<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list payments']);
        Permission::create(['name' => 'view payments']);
        Permission::create(['name' => 'create payments']);
        Permission::create(['name' => 'update payments']);
        Permission::create(['name' => 'delete payments']);

        Permission::create(['name' => 'list products']);
        Permission::create(['name' => 'view products']);
        Permission::create(['name' => 'create products']);
        Permission::create(['name' => 'update products']);
        Permission::create(['name' => 'delete products']);

        Permission::create(['name' => 'list receipts']);
        Permission::create(['name' => 'view receipts']);
        Permission::create(['name' => 'create receipts']);
        Permission::create(['name' => 'update receipts']);
        Permission::create(['name' => 'delete receipts']);

        Permission::create(['name' => 'list receiptproducts']);
        Permission::create(['name' => 'view receiptproducts']);
        Permission::create(['name' => 'create receiptproducts']);
        Permission::create(['name' => 'update receiptproducts']);
        Permission::create(['name' => 'delete receiptproducts']);

        Permission::create(['name' => 'list rosters']);
        Permission::create(['name' => 'view rosters']);
        Permission::create(['name' => 'create rosters']);
        Permission::create(['name' => 'update rosters']);
        Permission::create(['name' => 'delete rosters']);

        Permission::create(['name' => 'list sales']);
        Permission::create(['name' => 'view sales']);
        Permission::create(['name' => 'create sales']);
        Permission::create(['name' => 'update sales']);
        Permission::create(['name' => 'delete sales']);

        Permission::create(['name' => 'list saleproducts']);
        Permission::create(['name' => 'view saleproducts']);
        Permission::create(['name' => 'create saleproducts']);
        Permission::create(['name' => 'update saleproducts']);
        Permission::create(['name' => 'delete saleproducts']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
