<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'store_id' => 1,
            'name' => 'Notebook Asus',
            'price' => '2400'
        ]);

        Product::create([
            'store_id' => 1,
            'name' => 'Celular Samsung A30S',
            'price' => '1100'
        ]);

        Product::create([
            'store_id' => 1,
            'name' => 'Carrinho de Bebê',
            'price' => '400'
        ]);

        Product::create([
            'store_id' => 2,
            'name' => 'Notebook Dell',
            'price' => '3400'
        ]);

        Product::create([
            'store_id' => 2,
            'name' => 'Celular Motorola Moto G9',
            'price' => '1800'
        ]);

        Product::create([
            'store_id' => 2,
            'name' => 'Geladeira Brastemp',
            'price' => '2400'
        ]);
    }
}
