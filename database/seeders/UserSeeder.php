<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::Create([
            'name' => "Dinas Sosial P3A Prov. Bali",
            'email' => 'dinsosp3a@baliprov.go.id',
            'password' => '123',
        ]);

        // Berikan role admin
        $user->roles()->attach(\App\Models\Role::where('name', 'admin')->first()->value('id'));
    }
}
