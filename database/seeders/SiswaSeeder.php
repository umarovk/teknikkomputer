<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Support\Str;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelasIds = Kelas::pluck('id')->toArray();
        for ($i = 0; $i < 50; $i++) {
            Siswa::create([
                'nama' => 'Siswa ' . Str::random(5),
                'kelas_id' => $kelasIds[array_rand($kelasIds)],
                'foto' => null,
            ]);
        }
    }
} 