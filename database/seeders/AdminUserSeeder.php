<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // database/seeders/AdminUserSeeder.php
public function run()
{
    \App\Models\User::create([
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('password'),
        'role' => 'admin'
    ]);
}
}
