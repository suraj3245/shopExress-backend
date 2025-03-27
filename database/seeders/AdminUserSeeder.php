<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_role = Role::firstOrCreate(['name'=> 'admin']);
        $writer_role = Role::firstOrCreate(['name' => 'writer']);
        $admin = User::firstOrCreate([
            'name' => 'Admin',
            'email' => 'admin@admin.com'
        ],[
            'password' => bcrypt('password'),
        ]);
        $writer = User::firstOrCreate([
            'name' => 'Writer',
            'email' => 'writer@writer.com'
        ],[
            'password' => bcrypt('password')
        ]);

        $permissions = [
            'User Roles-open', 'User Roles-view', 'User Roles-edit', 'User Roles-create', 'User Roles-delete',
            'Sub Users-open', 'Sub Users-view', 'Sub Users-edit', 'Sub Users-create', 'Sub Users-delete',
            'Permissions-open', 'Permissions-view', 'Permissions-edit', 'Permissions-create', 'Permissions-delete',
            'Students-open', 'Students-view', 'Students-edit', 'Students-create', 'Students-delete',
            'Offline-open', 'Offline-view', 'Offline-edit', 'Offline-create', 'Offline-delete',
        ];
        foreach ($permissions as $permissionName) {
            $permission = Permission::firstOrCreate(['name' => $permissionName]);
        }

        $admin->assignRole($admin_role);
        $writer->assignRole($writer_role);
        

        $admin_role->givePermissionTo(Permission::all());
    }
}
