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
            'name' => 'Makanan Berat',
            'slug' => 'makanan-berat',
        ]);

        $product = Product::factory()->for($category)->create([
            'name' => 'Nasi Goreng Rempah Apadeh',
            'description' => 'Nasi goreng rempah dengan telur mata sapi.',
            'price' => 28000,
            'image' => 'products/nasi-goreng.jpg',
        ]);

        $response = $this->get(route('home'));

        $response
            ->assertOk()
            ->assertSee('PT_apadeh')
            ->assertSee('UMKM Kuliner Nusantara')
            ->assertSee('Makanan Berat')
            ->assertSee($product->name)
            ->assertSee('Rp 28.000');
    }

    public function test_home_page_can_filter_products_by_category(): void
    {
        $foodCategory = Category::factory()->create([
            'name' => 'Makanan Berat',
            'slug' => 'makanan-berat',
        ]);
        $drinkCategory = Category::factory()->create([
            'name' => 'Minuman',
            'slug' => 'minuman',
        ]);

        $food = Product::factory()->for($foodCategory)->create();
        $drink = Product::factory()->for($drinkCategory)->create();

        $response = $this->get(route('home', ['category' => 'minuman']));

        $response
            ->assertOk()
            ->assertSee('Menu Minuman')
            ->assertViewHas('products', function ($products) use ($drink, $food): bool {
                return $products->total() === 1
                    && $products->first()->is($drink)
                    && ! $products->contains($food);
            });
    }

    public function test_product_detail_page_displays_complete_product_information(): void
    {
        $category = Category::factory()->create([
            'name' => 'Minuman',
            'slug' => 'minuman',
        ]);

        $product = Product::factory()->for($category)->create([
            'name' => 'Kopi Susu Gula Aren',
            'description' => 'Espresso dengan susu segar dan gula aren alami.',
            'price' => 22000,
        ]);

        $response = $this->get(route('products.show', $product));

        $response
            ->assertOk()
            ->assertSee($product->name)
            ->assertSee($product->description)
            ->assertSee('Minuman')
            ->assertSee('Rp 22.000');
    }

    public function test_unknown_product_returns_not_found_page(): void
    {
        $this->get(route('products.show', 99999))->assertNotFound();
    }
}
