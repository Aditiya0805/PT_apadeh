<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's watch boutique categories.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Luxury Automatic',
                'slug' => 'luxury-automatic',
            ],
            [
                'name' => 'Chronograph & Racing',
                'slug' => 'chronograph-racing',
            ],
            [
                'name' => 'Diver & Professional',
                'slug' => 'diver-pro',
            ],
            [
                'name' => 'Avant-Garde & Titanium',
                'slug' => 'avant-garde-titanium',
            ],
            [
                'name' => 'Classic & Dress Watch',
                'slug' => 'classic-dress',
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
