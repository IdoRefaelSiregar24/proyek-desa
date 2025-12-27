<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateFirstUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        User::create([
            'name' => 'User Binda Desa',
            'email' => 'userbinadesa@gmail.com',
            'password' => Hash::make('Asdfg123'),
            'role' => 'User',
        ]);

        User::create([
            'name' => 'admin_royek',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Asdfg123'),
            'role' => 'Admin',
        ]);

        User::create([
            'name' => 'Ido Refael Siregar',
            'email' => 'ido24si@mahasiswa.pcr.ac.id',
            'password' => Hash::make('Asdfg123'),
            'role' => 'Super Admin',
        ]);
    }
}
