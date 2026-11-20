<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's product categories.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Makanan Berat',
                'slug' => 'makanan-berat',
            ],
            [
                'name' => 'Camilan',
                'slug' => 'camilan',
            ],
            [
                'name' => 'Minuman',
                'slug' => 'minuman',
            ],
        ];

        foreach ($categories as $category) {
            Category::query()->updateOrCreate(
                ['slug' => $category['slug']],
                ['name' => $category['name']],
            );
        }
    }
}
