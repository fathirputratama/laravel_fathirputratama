<?php

namespace Database\Seeders;

use App\Models\RumahSakit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RumahSakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RumahSakit::create([
            'nama_rumah_sakit' => 'Rumah Sakit 1',
            'alamat' => 'Jl. Raya Puncak No.100',
            'email' => 'rs1@gmail.com',
            'telepon' => '081234567891',
        ]);

        RumahSakit::create([
            'nama_rumah_sakit' => 'Rumah Sakit 2',
            'alamat' => 'Jl. Raya Puncak No.200',
            'email' => 'rs2@gmail.com',
            'telepon' => '081234567892',
        ]);

        RumahSakit::create([
            'nama_rumah_sakit' => 'Rumah Sakit 3',
            'alamat' => 'Jl. Raya Puncak No.300',
            'email' => 'rs3@gmail.com',
            'telepon' => '081234567893',
        ]);
    }
}
