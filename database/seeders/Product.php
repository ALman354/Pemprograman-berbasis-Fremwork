<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Product extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::create([
            'name' => 'Pisang Keju',
            'description' => 'Description for Product 1',
            'price' => 10.99,
            'stock' => 100,
        ]);
    }
    DB::table('product')->insert([
    [   
    'name' => 'Pisang Keju',
        'description' => 'Description for Product 1',
        'price' => 10.99,
        'stock' => 100,
    ],
        'name' => 'Pisang Coklat',
        'description' => 'Description for Product 2',
        'price' => 12.99,
        'stock' => 50,
    ]),
}
