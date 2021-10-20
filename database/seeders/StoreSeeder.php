<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::create([
            'name' => 'Americanas',
            'email' => 'atendimento@americanas.com.br'
        ]);

        Store::create([
            'name' => 'Casas Bahia',
            'email' => 'atendimento@americanas.com.br'
        ]);
    }
}
