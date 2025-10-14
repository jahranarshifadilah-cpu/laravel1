<?php
namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\Wali;
use Illuminate\Database\Seeder;

class RelasiSeeder extends Seeder
{
    public function run()
    {
        $mahasiswa = Mahasiswa::create([
            'nama' => 'Candra Herdiansyah',
            'nim'  => '123456',
        ]);

        Wali::create([
            'nama'         => 'Pak Herdi',
            'id_mahasiswa' => $mahasiswa->id,
        ]);
    }
}
