<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            ['id' => '1', 'menu_title' => 'Dashboard', 'parent_id' => 0, 'sort_order' => 0, 'slug' => '/', 'icon' => 'fas fa-tachometer-alt'],
            ['id' => '2', 'menu_title' => 'Pendataan PMKS', 'parent_id' => 0, 'sort_order' => 1, 'slug' => '/pmks', 'icon' => 'fas fa-address-card'],
            ['id' => '3', 'menu_title' => 'Pendataan PSKS', 'parent_id' => 0, 'sort_order' => 2, 'slug' => '/psks', 'icon' => 'fas fa-hand-holding-heart'],
            ['id' => '34', 'menu_title' => 'Komunikasi', 'parent_id' => 0, 'sort_order' => 3, 'slug' => '/komunikasi', 'icon' => 'fas fa-comments'],
            ['id' => '10', 'menu_title' => 'Pengaturan', 'parent_id' => 0, 'sort_order' => 10, 'slug' => '', 'icon' => 'fas fa-cogs'],
            ['id' => '11', 'menu_title' => 'User', 'parent_id' => 10, 'sort_order' => 1, 'slug' => '/admin/users', 'icon' => ''],
            ['id' => '12', 'menu_title' => 'Submenu level 1', 'parent_id' => 10, 'sort_order' => 2, 'slug' => '/admin/users', 'icon' => ''],
            ['id' => '13', 'menu_title' => 'Submenu level 2', 'parent_id' => 12, 'sort_order' => 1, 'slug' => '/admin/users', 'icon' => ''],
            ['id' => '14', 'menu_title' => 'Submenu level 3', 'parent_id' => 12, 'sort_order' => 2, 'slug' => '/admin/users', 'icon' => ''],
        ];
        foreach ($menus as $menu) {
            \App\Models\Menu::Create($menu);
        }
    }
}
