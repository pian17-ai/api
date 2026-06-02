<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'category_id' => 1,
                'name' => 'Espresso',
                'description' => 'Espresso 1 shot',
                'price' => 30000,
                'stock' => 10,
                'image_url' => 'products/69f17d6118bbd.png'
            ],
            [
                'category_id' => 1,
                'name' => 'Cappucino',
                'description' => 'Cappucino desc',
                'price' => 33000,
                'stock' => 10,
                'image_url' => 'products/69f17cddd6ed0.png'
            ],
            [
                'category_id' => 1,
                'name' => 'Latte',
                'description' => 'Latte desc',
                'price' => 34000,
                'stock' => 10,
                'image_url' => 'products/69f17d78ea64f.png'
            ],
            [
                'category_id' => 2,
                'name' => 'Matcha Latte',
                'description' => 'Matcha Latte desc',
                'price' => 38000,
                'stock' => 10,
                'image_url' => 'products/69f17c7b11c4d.png'
            ],
            [
                'category_id' => 3,
                'name' => 'Croissant',
                'description' => 'Croissant desc',
                'price' => 37000,
                'stock' => 10,
                'image_url' => 'products/69f17d47d000b.png'
            ],
            [
                'category_id' => 4,
                'name' => 'Cheesecake',
                'description' => 'Cheesecake desc',
                'price' => 40000,
                'stock' => 10,
                'image_url' => 'products/69f17d25cc088.png'
            ],
        ]);
    }
}
