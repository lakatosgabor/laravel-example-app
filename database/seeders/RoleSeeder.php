<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create_dashboard']);
        Permission::create(['name' => 'read_dashboard']);
        Permission::create(['name' => 'update_dashboard']);
        Permission::create(['name' => 'delete_dashboard']);


        $adminRole = Role::create(['name' => 'super-admin']);

        $editorRole = Role::create(['name' => 'hr']);
        $editorRole->givePermissionTo(['read_dashboard']);

        $user = User::find(1);
        $user->assignRole('super-admin');
    }
}
