<?php

namespace Database\Seeders;

use App\Models\Tahapan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateSeederTahapan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tahapan::create([
            'proyek_id' => 1,
            'nama_tahap' => 'Perencanaan',
            'target_persen' => 10,
            'tgl_mulai' => '2025-11-01',
            'tgl_selesai' => '2025-11-07',
        ]);

        Tahapan::create([
            'proyek_id' => 1,
            'nama_tahap' => 'Desain',
            'target_persen' => 20,
            'tgl_mulai' => '2025-11-08',
            'tgl_selesai' => '2025-11-14',
        ]);
    }
}
