<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateTahapanDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        $namaTahapList = [
            'Perencanaan',
            'Survei Lapangan',
            'Desain Arsitektur',
            'Pengadaan Material',
            'Konstruksi Awal',
            'Pemasangan Struktur',
            'Finishing & Interior',
            'Uji Coba',
            'Serah Terima',
            'Pemeliharaan Awal'
        ];

        foreach (range(1, 200) as $index) {
            DB::table('tahapan_proyek')->insert([
                'proyek_id' => rand(1, 10), // contoh proyek dummy 1-10
                'nama_tahap' => $faker->randomElement($namaTahapList),
                'target_persen' => rand(5, 100),
                'tgl_mulai' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
                'tgl_selesai' => $faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

