<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateKontraktor extends Seeder
{
    public function run(): void
    {
        // Ambil semua proyek_id yang tersedia
        $proyekIds = DB::table('proyek')->pluck('proyek_id');

        // Tentukan jumlah data yang ingin dibuat
        $jumlahData = 20;
        
        // Data master kontraktor
        $kontraktor = [
            ['PT Maju Jaya Konstruksi', 'Andi Saputra', '081234567890', 'Jl. Sudirman No. 10, Pekanbaru'],
            ['CV Bangun Sejahtera', 'Budi Santoso', '082345678901', 'Jl. Ahmad Yani No. 25, Pekanbaru'],
            ['PT Karya Nusantara', 'Siti Rahmawati', '083456789012', 'Jl. Diponegoro No. 7, Pekanbaru'],
            ['PT Cipta Infrastruktur', 'Rizky Pratama', '084567890123', 'Jl. HR Soebrantas Km 12, Pekanbaru'],
            ['CV Pilar Utama', 'Dewi Lestari', '085678901234', 'Jl. Tuanku Tambusai No. 55, Pekanbaru'],
            ['PT Mega Struktur', 'Hendra Gunawan', '086789012345', 'Jl. Riau No. 101, Pekanbaru'],
            ['PT Sinar Pembangunan', 'Agus Salim', '087890123456', 'Jl. Soekarno Hatta No. 20, Pekanbaru'],
            ['CV Karya Mandiri', 'Nur Aisyah', '088901234567', 'Jl. Imam Munandar No. 9, Pekanbaru'],
            ['PT Andalan Konstruksi', 'Fajar Nugraha', '089012345678', 'Jl. Hangtuah No. 88, Pekanbaru'],
            ['PT Bumi Raya Persada', 'Yusuf Maulana', '081901234567', 'Jl. Garuda Sakti Km 3, Pekanbaru'],
        ];

        for ($i = 0; $i < $jumlahData; $i++) {
            // Ambil data kontraktor secara bergiliran
            $data = $kontraktor[$i % count($kontraktor)];

            DB::table('kontraktor')->insert([
                'proyek_id' => $proyekIds->random(), // RANDOM & AMAN
                'nama' => $data[0] . ' ' . ($i + 1),
                'penanggung_jawab' => $data[1],
                'kontak' => $data[2],
                'alamat' => $data[3],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
