<?php

namespace Database\Seeders;

use App\User;
use App\Team;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class PermissionsSeeder extends Seeder
{
    /**
     * create the initial roles and permissions. 
     * https://spatie.be/docs/laravel-permission/v3/basic-usage/basic-usage
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit resources']);
        Permission::create(['name' => 'edit products']);
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'edit social media']);
        Permission::create(['name' => 'manage orders']);
        Permission::create(['name' => 'manage my orders']);
        Permission::create(['name' => 'view dashboard']);
        Permission::create(['name' => 'manage stripe account']);
        Permission::create(['name' => 'checkout']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('edit products');
        $role1->givePermissionTo('edit articles');
        $role1->givePermissionTo('edit social media');
        $role1->givePermissionTo('manage orders');
        $role1->givePermissionTo('view dashboard');

        $role2 = Role::create(['name' => 'customer']);
        $role2->givePermissionTo('manage my orders');
        $role2->givePermissionTo('checkout');

        $role3 = Role::create(['name' => 'Super Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider
    }
}
