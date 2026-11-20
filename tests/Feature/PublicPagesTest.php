<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_displays_business_profile_and_product_catalog(): void
    {
        $category = Category::factory()->create([
            'name' => 'Semen & Mortar',
            'slug' => 'semen-mortar',
        ]);

        $product = Product::factory()->for($category)->create([
            'name' => 'Semen Portland PCC 50kg SNI',
            'description' => 'Semen berkualitas tinggi berstandar SNI untuk struktur kokoh.',
            'price' => 68000,
            'image' => 'products/semen-portland-50kg.svg',
        ]);

        $response = $this->get(route('home'));

        $response
            ->assertOk()
            ->assertSee('PT_apadeh')
            ->assertSee('Pusat Material & Bangunan')
            ->assertSee('Semen & Mortar')
            ->assertSee($product->name)
            ->assertSee('Rp 68.000');
    }

    public function test_home_page_can_filter_products_by_category(): void
    {
        $cementCategory = Category::factory()->create([
            'name' => 'Semen & Mortar',
            'slug' => 'semen-mortar',
        ]);
        $steelCategory = Category::factory()->create([
            'name' => 'Besi & Baja Ringan',
            'slug' => 'besi-baja-ringan',
        ]);

        $cement = Product::factory()->for($cementCategory)->create();
        $steel = Product::factory()->for($steelCategory)->create();

        $response = $this->get(route('home', ['category' => 'besi-baja-ringan']));

        $response
            ->assertOk()
            ->assertSee('Katalog Besi & Baja Ringan')
            ->assertViewHas('products', function ($products) use ($steel, $cement): bool {
                return $products->total() === 1
                    && $products->first()->is($steel)
                    && ! $products->contains($cement);
            });
    }

    public function test_product_detail_page_displays_complete_product_information(): void
    {
        $category = Category::factory()->create([
            'name' => 'Besi & Baja Ringan',
            'slug' => 'besi-baja-ringan',
        ]);

        $product = Product::factory()->for($category)->create([
            'name' => 'Besi Beton Ulir D13 SNI',
            'description' => 'Besi beton ulir standar SNI untuk struktur kuat dan kokoh.',
            'price' => 135000,
        ]);

        $response = $this->get(route('products.show', $product));

        $response
            ->assertOk()
            ->assertSee($product->name)
            ->assertSee($product->description)
            ->assertSee('Besi & Baja Ringan')
            ->assertSee('Rp 135.000');
    }

    public function test_unknown_product_returns_not_found_page(): void
    {
        $this->get(route('products.show', 99999))->assertNotFound();
    }
}
