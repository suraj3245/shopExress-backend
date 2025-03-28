<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menuItems = [
            [
                'name' => 'Sub Users',
                'url' => '/subuser',
                'link' => 'subuser.index',
                'icon' => 'users',
                'permission' => 'Sub Users-open',
            ],
            [
                'name' => 'User Roles',
                'url' => '/roles',
                'link' => 'roles.index',
                'icon' => 'user-shield', // 🛡️ User with a shield (security/roles)
                'permission' => 'User Roles-open',
            ],
            [
                'name' => 'Permissions',
                'url' => '/permissions',
                'link' => 'permissions.index',
                'icon' => 'user-check',
                'permission' => 'Permissions-open'
            ],
        ];
        foreach ($menuItems as $menuItem) {
            // Check if a menu item with the same URL already exists
            $existingMenuItem = DB::table('menus')->where('url', $menuItem['url'])->first();

            // If the menu item doesn't exist, insert a new record
            if ($existingMenuItem === null) {
                DB::table('menus')->insert($menuItem);
            }
        }

    }
}
