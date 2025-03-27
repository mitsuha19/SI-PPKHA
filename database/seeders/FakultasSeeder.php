<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fakultas::create(['name' => 'Vokasi']);
        Fakultas::create(['name' => 'FITE']);
        Fakultas::create(['name' => 'FTI']);
        Fakultas::create(['name' => 'Bioteknologi']);
    }
}
