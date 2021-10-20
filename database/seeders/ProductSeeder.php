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
            'price' => '2.400',
            'active' => true
        ]);

        Product::create([
            'store_id' => 1,
            'name' => 'Celular Samsung A30S',
            'price' => '1.100',
            'active' => true
        ]);

        Product::create([
            'store_id' => 1,
            'name' => 'Carrinho de Bebê',
            'price' => '400',
            'active' => true
        ]);

        Product::create([
            'store_id' => 2,
            'name' => 'Notebook Dell',
            'price' => '3.400',
            'active' => true
        ]);

        Product::create([
            'store_id' => 2,
            'name' => 'Celular Motorola Moto G9',
            'price' => '1.800',
            'active' => true
        ]);

        Product::create([
            'store_id' => 2,
            'name' => 'Geladeira Brastemp',
            'price' => '2.400',
            'active' => true
        ]);
    }
}
