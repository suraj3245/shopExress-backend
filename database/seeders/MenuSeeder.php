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
