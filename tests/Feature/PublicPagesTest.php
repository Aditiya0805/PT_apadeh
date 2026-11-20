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
            'name' => 'Luxury Automatic',
            'slug' => 'luxury-automatic',
        ]);

        $product = Product::factory()->for($category)->create([
            'name' => 'Rolex Submariner Date 41mm Cerachrom',
            'description' => 'Jam tangan penyelam legendaris dengan bezel keramik Cerachrom hitam.',
            'price' => 245000000,
            'image' => 'products/rolex-submariner-date.png',
        ]);

        $response = $this->get(route('home'));

        $response
            ->assertOk()
            ->assertSee('PT_apadeh')
            ->assertSee('Boutique Jam Tangan Mewah')
            ->assertSee('Luxury Automatic')
            ->assertSee($product->name)
            ->assertSee('Rp 245.000.000');
    }

    public function test_home_page_can_filter_products_by_category(): void
    {
        $diverCategory = Category::factory()->create([
            'name' => 'Diver & Professional',
            'slug' => 'diver-pro',
        ]);
        $chronoCategory = Category::factory()->create([
            'name' => 'Chronograph & Racing',
            'slug' => 'chronograph-racing',
        ]);

        $diver = Product::factory()->for($diverCategory)->create();
        $chrono = Product::factory()->for($chronoCategory)->create();

        $response = $this->get(route('home', ['category' => 'chronograph-racing']));

        $response
            ->assertOk()
            ->assertSee('Katalog Chronograph & Racing')
            ->assertViewHas('products', function ($products) use ($chrono, $diver): bool {
                return $products->total() === 1
                    && $products->first()->is($chrono)
                    && ! $products->contains($diver);
            });
    }

    public function test_product_detail_page_displays_complete_product_information(): void
    {
        $category = Category::factory()->create([
            'name' => 'Chronograph & Racing',
            'slug' => 'chronograph-racing',
        ]);

        $product = Product::factory()->for($category)->create([
            'name' => 'Rolex Cosmograph Daytona Oysterflex',
            'description' => 'Ikon sirkuit balap dunia dengan bezel Cerachrom takimeter presisi tinggi.',
            'price' => 585000000,
        ]);

        $response = $this->get(route('products.show', $product));

        $response
            ->assertOk()
            ->assertSee($product->name)
            ->assertSee($product->description)
            ->assertSee('Chronograph & Racing')
            ->assertSee('Rp 585.000.000');
    }

    public function test_unknown_product_returns_not_found_page(): void
    {
        $this->get(route('products.show', 99999))->assertNotFound();
    }
}
