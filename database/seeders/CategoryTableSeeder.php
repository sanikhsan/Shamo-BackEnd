<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Sneakers'
            ],
            [
                'name' => 'Wedges'
            ],
            [
                'name' => 'Flat Shoes'
            ],
            [
                'name' => 'Loafers'
            ],
            [
                'name' => 'Boots'
            ],
            [
                'name' => 'Slip On'
            ],
            [
                'name' => 'Derby Shoes'
            ],
        ];

        foreach ($categories as $category) {
            ProductCategory::create($category);
        }
    }
}
