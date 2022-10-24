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
        \App\Models\User::Create([
            'name' => "Dinas Sosial P3A Prov. Bali",
            'email' => 'dissosp3@baliprov.go.id',
            'password' => Hash::make('123'),
        ]);
    }
}
