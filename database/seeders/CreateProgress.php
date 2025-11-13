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
        $faker = Factory::create('id_ID');

        foreach (range(1, 50) as $index) {
            DB::table('progress')->insert([
                'tahap_id'   => rand(1, 20),
                'user_id'    => rand(1, 50),
                'persentase' => rand(1, 100),
                'keterangan' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

