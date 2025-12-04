<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateUser extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        // Role yang tersedia
        $roles = ['User', 'Surveyor', 'Manajer Lapangan', 'Admin Proyek', 'Super Admin'];

        // Generate 10 user baru
        for ($i = 0; $i < 200; $i++) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'role' => $faker->randomElement($roles),
                'password' => Hash::make('Asdfg123'),
            ]);
        }
    }
}
