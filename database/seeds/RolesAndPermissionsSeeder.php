<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_permissions = ['edit users','add users', 'delete users', 'view users'];
        $product_permissions = ['edit products', 'delete products', 'add products' ];

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create user permissions
        Permission::create(['name' => 'add admin']);
        
        foreach($user_permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        
        // create product permissions
        foreach($product_permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // create admin roles and assign created permissions

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(array_merge($user_permissions, $product_permissions));

        // create user roles and assign created permissions
        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo($product_permissions);

    }
}
