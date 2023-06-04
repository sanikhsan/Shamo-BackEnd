<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Geoff Max Footwear',
                'price' => 355000,
                'description' => 'Geoff Max Footwear (GMX) merupakan merk lokal yang juga memproduksi sneakers kanvas dengan variasi warna dan tipe yang bisa kamu pilih.',
                'tags' => 'GMX, Sneakers, Lokal',
                'product_categories_id' => 1
            ],
            [
                'name' => 'Carvil AUREL-L',
                'price' => 55000,
                'description' => 'CARVIL AUREL - L, Sandal Wedges Jepit Wanita',
                'tags' => 'Carvil, Wedges',
                'product_categories_id' => 2
            ],
            [
                'name' => 'Blow - Edna',
                'price' => 123000,
                'description' => 'Blow BLNW 0003 Edna Flats Shoes wanita dengan design elegan',
                'tags' => 'Edna, Flat Shoes',
                'product_categories_id' => 3
            ],
            [
                'name' => 'Buccheri Kojo Loafers',
                'price' => 559000,
                'description' => 'KOJO merupakan sepatu slip on formal yang di desain khusus yang menonjolkan tampilan yang elegan.',
                'tags' => 'Kojo, Loafers',
                'product_categories_id' => 4
            ],
            [
                'name' => 'Jonas Tan - Ankle Chukka Desert Boots',
                'price' => 940000,
                'description' => 'Terinspirasi dari desert boots legendaris yang dipakai para tentara di gurun ketika perang dunia, kami menginterpretasikan momen tersebut ke dalam model sepatu ini.',
                'tags' => 'Jonas Tan, Boots',
                'product_categories_id' => 5
            ],
            [
                'name' => 'VANS SLIP ON 44 DX BEIGE',
                'price' => 679000,
                'description' => 'SEPATU VANS SLIP ON 44 DX WOVEN PLAID',
                'tags' => 'VANS, Slip On',
                'product_categories_id' => 6
            ],
            [
                'name' => 'Kenzio Kuta Black',
                'price' => 560000,
                'description' => 'Kenzio Kuta Black - Sepatu Pantofel Formal Kerja Pria Derby Shoes',
                'tags' => 'Kenzio, Derby Shoes',
                'product_categories_id' => 7
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
