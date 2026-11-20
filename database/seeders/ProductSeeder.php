<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Seed the application's products and copy their placeholder images.
     */
    public function run(): void
    {
        Storage::disk('public')->makeDirectory('products');

        $categoryIds = Category::query()->pluck('id', 'slug');

        $products = [
            [
                'category' => 'makanan-berat',
                'name' => 'Nasi Goreng Rempah Apadeh',
                'description' => 'Nasi goreng dengan racikan rempah Nusantara, telur mata sapi, ayam suwir, dan sambal bawang rumahan. Disajikan hangat dengan aroma smoky yang menggugah selera.',
                'price' => 28000,
                'image' => 'nasi-goreng-rempah.svg',
            ],
            [
                'category' => 'makanan-berat',
                'name' => 'Ayam Bakar Sambal Matah',
                'description' => 'Ayam kampung pilihan yang dibakar dengan bumbu kecap madu, disajikan bersama sambal matah segar, lalapan, dan nasi hangat.',
                'price' => 35000,
                'image' => 'ayam-bakar-sambal-matah.svg',
            ],
            [
                'category' => 'camilan',
                'name' => 'Tahu Crispy Saus Madu',
                'description' => 'Tahu susu yang digoreng renyah dengan lapisan tepung ringan, lalu dilelehkan bersama saus madu pedas dan taburan wijen.',
                'price' => 18000,
                'image' => 'tahu-crispy-saus-madu.svg',
            ],
            [
                'category' => 'camilan',
                'name' => 'Pisang Goreng Keju',
                'description' => 'Pisang raja manis berbalut adonan renyah, ditaburi keju cheddar parut dan saus karamel. Camilan favorit untuk menemani waktu santai.',
                'price' => 15000,
                'image' => 'pisang-goreng-keju.svg',
            ],
            [
                'category' => 'minuman',
                'name' => 'Kopi Susu Gula Aren',
                'description' => 'Espresso robusta pilihan yang dipadukan susu segar dan gula aren alami. Manisnya lembut dengan aroma kopi yang kuat dan seimbang.',
                'price' => 22000,
                'image' => 'kopi-susu-gula-aren.svg',
            ],
            [
                'category' => 'minuman',
                'name' => 'Es Teh Lemon Serai',
                'description' => 'Teh hitam dingin dengan perasan lemon segar, serai, dan sedikit madu. Ringan, menyegarkan, dan cocok dinikmati kapan saja.',
                'price' => 12000,
                'image' => 'es-teh-lemon-serai.svg',
            ],
        ];

        foreach ($products as $product) {
            $this->copyPlaceholderImage($product['image']);

            Product::query()->updateOrCreate(
                ['name' => $product['name']],
                [
                    'category_id' => $categoryIds[$product['category']],
                    'description' => $product['description'],
                    'price' => $product['price'],
                    'image' => 'products/'.$product['image'],
                ],
            );
        }
    }

    /**
     * Copy a bundled placeholder image into the public storage disk.
     */
    private function copyPlaceholderImage(string $filename): void
    {
        $source = public_path('images/products/'.$filename);

        if (File::exists($source)) {
            Storage::disk('public')->put('products/'.$filename, File::get($source));
        }
    }
}
