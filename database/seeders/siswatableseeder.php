<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class siswatableseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswa = [
            ['nama' =>'jahran', 'kelas' =>'xirpl3', 'alamat' =>'gg.situtarate'],
            ['nama' =>'lintang', 'kelas' =>'xirpl3', 'alamat' =>'sadang'],
            ['nama' =>'iqbal', 'kelas' =>'xirpl3', 'alamat' =>'manglid'],
            ['nama' =>'gojin', 'kelas' =>'xirpl3', 'alamat' =>'sukamenak'],
            ['nama' =>'arya', 'kelas' =>'xirpl3', 'alamat' =>'tarate']
        ];

        DB::table('siswa')->insert($siswa); 
    }
}
