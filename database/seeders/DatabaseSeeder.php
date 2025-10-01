<?php

namespace Database\Seeders;

use App\Models\Pengguna;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Pengguna::factory()->create([
            'username' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('fawwaz123'),
            'nama_depan' => 'Fawwaz',
            'nama_belakang' => 'Naufal',
            'role' => 'Public'
        ]);
    }
}
