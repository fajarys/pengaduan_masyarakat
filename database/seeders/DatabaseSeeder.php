<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Petugas::create(
            [
                'nama_petugas' => 'Adminstrator',
                'username' => 'admins',
                'password' => Hash::make('admin123'),
                'telp' => '0877656543',
                'level' => 'admin',
            ],
            [
                'nama_petugas' => 'Petugas',
                'username' => 'petugas',
                'password' => Hash::make('petugas123'),
                'telp' => '08765434524',
                'level' => 'petugas',
            ]
        );
    }
}
