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

        $deskripsiList = [
            'Proyek ini bertujuan untuk meningkatkan kualitas dan kapasitas infrastruktur di wilayah terkait.',
            'Kegiatan ini mencakup perencanaan, pembangunan, dan pemeliharaan fasilitas umum agar lebih efisien.',
            'Fokus proyek adalah memberikan pelayanan yang lebih baik kepada masyarakat melalui pembangunan berkelanjutan.',
            'Proyek ini diharapkan dapat mendukung pertumbuhan ekonomi lokal dan kesejahteraan masyarakat.',
            'Melalui proyek ini, diupayakan peningkatan aksesibilitas dan konektivitas antar daerah.',
            'Pembangunan ini menitikberatkan pada aspek keselamatan, kualitas, dan keberlanjutan lingkungan.',
            'Proyek ini merupakan bagian dari program pemerintah untuk memperkuat infrastruktur nasional.',
            'Dengan proyek ini, diharapkan dapat tercipta fasilitas publik yang modern dan nyaman bagi warga.',
            'Proyek ini dirancang untuk memenuhi standar teknis dan regulasi yang berlaku di Indonesia.',
            'Tujuan utama proyek ini adalah meningkatkan efisiensi dan efektivitas layanan publik di wilayah target.'
        ];

        foreach (range(1, 50) as $index) {
            DB::table('proyek')->insert([
                'kode_proyek' => strtoupper($faker->bothify('PRJ-###??')),
                'nama_proyek' => $faker->randomElement($namaProyekList),
                'tahun' => $faker->year('now'),
                'lokasi' => $faker->city,
                'anggaran' => $faker->randomFloat(2, 100000000, 5000000000),
                'sumber_dana' => $faker->randomElement(['APBN', 'APBD', 'Swasta', 'Hibah']),
                'deskripsi' => $faker->randomElement($deskripsiList),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
