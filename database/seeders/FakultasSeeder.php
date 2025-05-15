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
        Fakultas::create(['name' => 'Informatika dan Teknik Elektro']);
        Fakultas::create(['name' => 'Teknologi Industri']);
        Fakultas::create(['name' => 'Bioteknologi']);
    }
}
