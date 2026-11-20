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
     * Seed the application's luxury watch boutique products.
     */
    public function run(): void
    {
        Storage::disk('public')->makeDirectory('products');

        $categoryIds = Category::query()->pluck('id', 'slug');

        $products = [
            [
                'category' => 'diver-pro',
                'name' => 'Rolex Submariner Date 41mm Cerachrom',
                'description' => 'Jam tangan penyelam legendaris dengan bezel keramik Cerachrom hitam anti-gores, dial hitam legap dengan indeks Chromalight berpendar biru cerah. Ditenagai kaliber otomatis 3235 dengan cadangan daya 70 jam dan ketahanan air hingga kedalaman 300 meter.',
                'price' => 245000000,
                'image' => 'rolex-submariner-date.png',
            ],
            [
                'category' => 'chronograph-racing',
                'name' => 'Rolex Cosmograph Daytona Oysterflex',
                'description' => 'Ikon sirkuit balap dunia dengan bezel Cerachrom takimeter presisi tinggi, casing emas putih 18 karat, dial perak sunburst dengan sub-dial kontras, serta strap Oysterflex elastomer berteknologi bilah logam fleksibel. Digerakkan kaliber chronograph 4130.',
                'price' => 585000000,
                'image' => 'rolex-cosmograph-daytona.png',
            ],
            [
                'category' => 'luxury-automatic',
                'name' => 'Rolex Datejust 41 Bright Blue Dial Jubilee',
                'description' => 'Simbol keanggunan klasik dengan dial biru sunburst cemerlang, bezel fluted emas putih berkilau, dan rantai Jubilee lima baris yang sangat ergonomis. Dilengkapi jendela tanggal Cyclops pembesar 2.5x dan mekanisme otomatis kaliber 3235 bersertifikasi Superlative Chronometer.',
                'price' => 195000000,
                'image' => 'rolex-datejust-41-blue.png',
            ],
            [
                'category' => 'diver-pro',
                'name' => 'Heritage Diver Oceanic 300M Beads-of-Rice',
                'description' => 'Jam tangan selam bergaya vintage dengan gradasi dial biru samudra berpendar luks, bezel rotasi keramik satu arah 120 klik, dan rantai beads-of-rice stainless steel 316L yang lentur. Memiliki ketahanan tekanan laut dalam 300 meter dengan katup helium escapement.',
                'price' => 42500000,
                'image' => 'heritage-diver-oceanic.png',
            ],
            [
                'category' => 'avant-garde-titanium',
                'name' => 'Aura Stealth Minimalist Titanium Edition',
                'description' => 'Mahakarya minimalis avant-garde berbahan casing & rantai Titanium Grade 5 ultra ringan dengan lapisan DLC matte anthracite anti gores. Desain dial monokromatis bersih tanpa tanggal dengan jarum lance presisi dan kaliber otomatis slimline 28.800 vph.',
                'price' => 28500000,
                'image' => 'aura-stealth-minimalist.png',
            ],
            [
                'category' => 'classic-dress',
                'name' => 'Casio Classic Stainless Steel Roman Dial 50M',
                'description' => 'Jam tangan dress klasik esensial dengan dial hitam bertekstur sunray elegan dan angka Romawi klasik di posisi XII, VI, dan IX. Casing dan rantai stainless steel solid, ketahanan air 50 meter, serta pergerakan quartz Jepang dengan akurasi tinggi dan baterai tahan lama.',
                'price' => 1250000,
                'image' => 'casio-classic-roman-steel.png',
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
