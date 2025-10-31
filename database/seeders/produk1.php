<?php
namespace Database\Seeders;

use App\Models\Produk1;
use Illuminate\Database\Seeder;

class Produk1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produk1s = [
            [
                'nama_produk' => 'Produk A',
                'harga'       => 50000,
                'stok'        => 100,
            ],
            [
                'nama_produk' => 'Produk B',
                'harga'       => 75000,
                'stok'        => 80,
            ],
            [
                'nama_produk' => 'Produk C',
                'harga'       => 100000,
                'stok'        => 50,
            ],
            [
                'nama_produk' => 'Produk D',
                'harga'       => 20000,
                'stok'        => 150,
            ],
            [
                'nama_produk' => 'Produk E',
                'harga'       => 120000,
                'stok'        => 30,
            ],
        ];

        foreach ($produk1s as $produk1) {
            Produk1::create($produk1);
        }
    }
}
