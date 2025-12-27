<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class CreateWarga extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        /**
         * Ambil user yang BELUM memiliki data warga
         * Ini menjamin relasi one-to-one
         */
        $users = DB::table('users')
            ->leftJoin('warga', 'users.id', '=', 'warga.user_id')
            ->whereNull('warga.user_id')
            ->select('users.id', 'users.name', 'users.email')
            ->get();

        foreach ($users as $user) {
            DB::table('warga')->insert([
                'user_id' => $user->id,
                'no_ktp' => $faker->unique()->nik(),
                'nama' => $faker->name(),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                'pekerjaan' => $faker->jobTitle(),
                'telp' => $faker->phoneNumber(),
                'email' => $user->email,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
