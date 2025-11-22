<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Progress;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateProgress extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        foreach (range(1, 200) as $index) {

            DB::table('progres_proyek')->insert([
                'proyek_id' => rand(1, 20),
                'tahap_id' => rand(1, 20),
                'persen_real' => $faker->randomFloat(2, 0, 100),
                'tanggal' => $faker->date(),
                'catatan' => $faker->sentence(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

