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
            [
                'id' => '1',
                'menu_title' => 'Dashboard',
                'parent_id' => 0,
                'sort_order' => 0,
                'slug' => '/',
                'icon' => 'fas fa-tachometer-alt',
                'allowed_gates' => '["is-admin", "is-user"]'
            ],
            [
                'id' => '2',
                'menu_title' => 'Pendataan PMKS',
                'parent_id' => 0,
                'sort_order' => 1,
                'slug' => '/pmks',
                'icon' => 'fas fa-address-card',
                'allowed_gates' => '["is-admin", "is-user"]'
            ],
            [
                'id' => '3',
                'menu_title' => 'Pendataan PSKS',
                'parent_id' => 0,
                'sort_order' => 2,
                'slug' => '/psks',
                'icon' => 'fas fa-hand-holding-heart',
                'allowed_gates' => '["is-admin", "is-user"]'
            ],
            [
                'id' => '4',
                'menu_title' => 'Komunikasi',
                'parent_id' => 0,
                'sort_order' => 3,
                'slug' => '/komunikasi',
                'icon' => 'fas fa-comments',
                'allowed_gates' => '["is-admin", "is-user"]'
            ],
            [
                'id' => '10',
                'menu_title' => 'Pengaturan',
                'parent_id' => 0,
                'sort_order' => 10,
                'slug' => '',
                'icon' => 'fas fa-cogs',
                'allowed_gates' => '["is-admin"]'
            ],
            [
                'id' => '11',
                'menu_title' => 'User',
                'parent_id' => 10,
                'sort_order' => 1,
                'slug' => '/admin/users',
                'icon' => '',
                'allowed_gates' => '["is-admin"]'
            ],
            [
                'id' => '12',
                'menu_title' => 'Submenu level 1',
                'parent_id' => 10,
                'sort_order' => 2,
                'slug' => '/admin/sub1',
                'icon' => '',
                'allowed_gates' => '["is-admin"]'
            ],
            [
                'id' => '13',
                'menu_title' => 'Submenu level 2',
                'parent_id' => 12,
                'sort_order' => 1,
                'slug' => '/admin/sub2',
                'icon' => '',
                'allowed_gates' => '["is-admin"]'
            ],
            [
                'id' => '14',
                'menu_title' => 'Submenu level 3',
                'parent_id' => 12,
                'sort_order' => 2,
                'slug' => '/admin/sub3',
                'icon' => '',
                'allowed_gates' => '["is-admin"]'
            ],
        ];
        foreach ($menus as $menu) {
            \App\Models\Menu::Create($menu);
        }
    }
}
