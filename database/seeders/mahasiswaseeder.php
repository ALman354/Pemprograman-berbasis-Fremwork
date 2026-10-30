<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class mahasiswaseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\mahasiswas::create([
            'nama' => 'John Doe',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Jl. Contoh Alamat No. 123',
            'no_hp' => '081234567890',
        ]);
    }
}
