<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's material categories.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Semen & Mortar',
                'slug' => 'semen-mortar',
            ],
            [
                'name' => 'Besi & Baja Ringan',
                'slug' => 'besi-baja-ringan',
            ],
            [
                'name' => 'Bata & Material Dasar',
                'slug' => 'bata-material-dasar',
            ],
            [
                'name' => 'Cat & Pelapis',
                'slug' => 'cat-pelapis',
            ],
            [
                'name' => 'Keramik & Granit',
                'slug' => 'keramik-granit',
            ],
            [
                'name' => 'Atap & Pipa',
                'slug' => 'atap-pipa',
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
