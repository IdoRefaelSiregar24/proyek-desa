<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateProyekDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        // Contoh nama proyek realistis Indonesia
        $namaProyekList = [
            'Pembangunan Jalan Raya Nasional',
            'Rehabilitasi Jembatan Citarum',
            'Peningkatan Infrastruktur Pelabuhan',
            'Proyek Sanitasi Kota Surabaya',
            'Pengembangan Kawasan Industri Medan',
            'Renovasi Gedung Sekolah Dasar',
            'Program Penyediaan Air Bersih',
            'Pembangunan Rumah Sakit Umum Daerah',
            'Revitalisasi Pasar Tradisional',
            'Proyek Pembangunan Bendungan Baru'
        ];

        foreach (range(1, 50) as $index) {
            DB::table('proyek')->insert([
                'kode_proyek' => strtoupper($faker->bothify('PRJ-###??')),
                'nama_proyek' => $faker->randomElement($namaProyekList),
                'tahun'       => $faker->year('now'),
                'lokasi'      => $faker->city,
                'anggaran'    => $faker->randomFloat(2, 100000000, 5000000000),
                'sumber_dana' => $faker->randomElement(['APBN', 'APBD', 'Swasta', 'Hibah']),
                'deskripsi'   => $faker->sentence(10),
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
