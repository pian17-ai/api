<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'full_name' => 'admin',
                'email' => 'admin@arch.org',
                'password' => Hash::make(121212),
            ],
            [
                'full_name' => 'kubocchi',
                'email' => 'kubocchi@arch.org',
                'password' => Hash::make(121212),
            ]
        ]);
    }
}
