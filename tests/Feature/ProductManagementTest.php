<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_the_product_list(): void
    {
        $product = Product::factory()->create();

        $response = $this->get(route('admin.products.index'));

        $response
            ->assertOk()
            ->assertSee('Kelola produk')
            ->assertSee($product->name);
    }

    public function test_admin_can_view_the_create_and_edit_forms(): void
    {
        $category = Category::factory()->create();
        $product = Product::factory()->for($category)->create([
            'name' => 'Produk Untuk Diedit',
        ]);

        $this->get(route('admin.products.create'))
            ->assertOk()
            ->assertSee('Tambah produk')
            ->assertSee($category->name);

        $this->get(route('admin.products.edit', $product))
            ->assertOk()
            ->assertSee('Edit produk')
            ->assertSee($product->name);
    }

    public function test_admin_can_create_a_product_with_an_image(): void
    {
        Storage::fake('public');

        $category = Category::factory()->create();
        $image = UploadedFile::fake()->image('menu.jpg', 1200, 900)->size(1024);

        $response = $this->post(route('admin.products.store'), [
            'category_id' => $category->id,
            'name' => 'Nasi Goreng Spesial',
            'description' => 'Nasi goreng dengan telur, ayam suwir, dan sambal bawang.',
            'price' => 30000,
            'image' => $image,
        ]);

        $response
            ->assertRedirect(route('admin.products.index'))
            ->assertSessionHas('success');

        $product = Product::query()->firstOrFail();

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'category_id' => $category->id,
            'name' => 'Nasi Goreng Spesial',
            'price' => 30000,
        ]);
        $this->assertStringStartsWith('products/', $product->image);
        Storage::disk('public')->assertExists($product->image);
    }

    public function test_product_creation_requires_server_side_validation(): void
    {
        $this->post(route('admin.products.store'), [])
            ->assertSessionHasErrors([
                'category_id',
                'name',
                'description',
                'price',
                'image',
            ]);

        $this->assertDatabaseCount('products', 0);
    }

    public function test_product_image_must_be_a_supported_image_type(): void
    {
        Storage::fake('public');

        $category = Category::factory()->create();
        $image = UploadedFile::fake()->create('dokumen.pdf', 100, 'application/pdf');

        $this->post(route('admin.products.store'), [
            'category_id' => $category->id,
            'name' => 'Produk Tidak Valid',
            'description' => 'Deskripsi produk untuk pengujian validasi gambar.',
            'price' => 10000,
            'image' => $image,
        ])->assertSessionHasErrors('image');

        $this->assertDatabaseCount('products', 0);
    }

    public function test_admin_can_update_a_product_and_replace_its_image(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('products/foto-lama.jpg', 'foto lama');

        $category = Category::factory()->create();
        $product = Product::factory()->for($category)->create([
            'name' => 'Menu Lama',
            'image' => 'products/foto-lama.jpg',
        ]);
        $newImage = UploadedFile::fake()->image('foto-baru.png', 1200, 900);

        $response = $this->put(route('admin.products.update', $product), [
            'category_id' => $category->id,
            'name' => 'Menu Baru',
            'description' => 'Deskripsi produk yang sudah diperbarui.',
            'price' => 45000,
            'image' => $newImage,
        ]);

        $response
            ->assertRedirect(route('admin.products.index'))
            ->assertSessionHas('success');

        $product->refresh();

        $this->assertSame('Menu Baru', $product->name);
        $this->assertSame('45000.00', $product->price);
        $this->assertNotSame('products/foto-lama.jpg', $product->image);
        Storage::disk('public')->assertMissing('products/foto-lama.jpg');
        Storage::disk('public')->assertExists($product->image);
    }

    public function test_admin_can_update_a_product_without_replacing_its_image(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('products/foto-tetap.jpg', 'foto tetap');

        $category = Category::factory()->create();
        $product = Product::factory()->for($category)->create([
            'image' => 'products/foto-tetap.jpg',
        ]);

        $this->put(route('admin.products.update', $product), [
            'category_id' => $category->id,
            'name' => 'Nama Setelah Edit',
            'description' => 'Deskripsi produk tanpa mengganti gambar.',
            'price' => 27000,
        ])->assertRedirect(route('admin.products.index'));

        $product->refresh();

        $this->assertSame('products/foto-tetap.jpg', $product->image);
        Storage::disk('public')->assertExists('products/foto-tetap.jpg');
    }

    public function test_admin_can_delete_a_product_and_its_image(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('products/foto-dihapus.jpg', 'foto dihapus');

        $product = Product::factory()->create([
            'image' => 'products/foto-dihapus.jpg',
        ]);

        $this->delete(route('admin.products.destroy', $product))
            ->assertRedirect(route('admin.products.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
        Storage::disk('public')->assertMissing('products/foto-dihapus.jpg');
    }
}
