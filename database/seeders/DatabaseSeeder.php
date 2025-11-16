<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'atmin',
            'kontak' => '085860886266',
            'username' => 'atmin123',
            'password' => bcrypt('12345'),
            'role' => 'admin',
        ]);
        User::create([
            'nama' => 'bintang',
            'kontak' => '085720054296',
            'username' => 'bintang123',
            'password' => bcrypt('12345'),
            'role' => 'member',
        ]);
    }
}
