<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('admin4745'),
            ],
            [
                'name' => 'Vendor',
                'username' => 'vendor',
                'email' => 'vendor@mail.com',
                'role' => 'vendor',
                'password' => bcrypt('vendor4745'),
            ],
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'role' => 'user',   
                'password' => bcrypt('user4745'),
            ]
        ]);
    }
}