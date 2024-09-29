<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Product::factory(100)->create();
        $items = [
            [
                'name' => 'Pencil',
                'price'=> 12,
                // 'quantity' => fake()->randomDigitNotNull
            ],
            [
                'name' => 'Book',
                'price'=> 15,
                // 'quantity' => fake()->randomDigitNotNull
            ],
            [
                'name' => 'Ruler',
                'price'=> 2,
                // 'quantity' => fake()->randomDigitNotNull
            ],
            
        ];

        Product::insert($items);

    }
}
