<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Membuat akun Ustadz default untuk login aplikasi
        User::create([
            'name' => 'Ustadz Darul Ulum',
            'email' => 'ustadz@darululum.com',
            'password' => Hash::make('passwordustadz123'), // Ini password untuk login nanti
        ]);

        // 2. Memanggil Seeder data santri yang banyak kemarin
        $this->call([
            SantriSeeder::class,
        ]);
    }
}