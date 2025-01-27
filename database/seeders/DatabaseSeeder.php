<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\kaffah;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Menggunakan factory untuk model kaffah
        kaffah::factory()->create([
            'name' => 'Ahmad',
            'tahun' => '2023',
            'januari' => '✔',
            'februari' => '✘',
            'maret' => '✔',
            'april' => '✔',
            'mei' => '✔',
            'juni' => '✔',
            'juli' => '✔',
            'agustus' => '✔',
            'september' => '✔',
            'oktober' => '✔',
            'november' => '✔',
            'desember' => '✔',
        ]);
    }
}