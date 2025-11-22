<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateWargaDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        $agamaList = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];
        $pekerjaanList = ['Petani', 'Guru', 'Karyawan Swasta', 'Wiraswasta', 'PNS', 'Nelayan', 'Mahasiswa', 'Pengusaha'];

        foreach (range(1, 200) as $index) {
            DB::table('warga')->insert([
                'no_ktp'       => $faker->unique()->numerify('##############'),
                'nama'         => $faker->name,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'agama'        => $faker->randomElement($agamaList),
                'pekerjaan'    => $faker->randomElement($pekerjaanList),
                'telp'         => $faker->phoneNumber,
                'email'        => $faker->unique()->safeEmail,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }
    }
}
