<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Pasien::create([
            'nama_pasien' => 'Rojak',
            'alamat' => 'Jl. Eceng No 1000',
            'no_telpon' => '082234567891',
            'rumah_sakit_id' => 1,
        ]);

        Pasien::create([
            'nama_pasien' => 'Rudi',
            'alamat' => 'Jl. Eceng No 2000',
            'no_telpon' => '082234567892',
            'rumah_sakit_id' => 2,
        ]);

        Pasien::create([
            'nama_pasien' => 'Lionel',
            'alamat' => 'Jl. Eceng No 3000',
            'no_telpon' => '082234567893',
            'rumah_sakit_id' => 3,
        ]);
    }
}
