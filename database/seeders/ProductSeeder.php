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
     * Seed the application's material products and copy their placeholder images.
     */
    public function run(): void
    {
        Storage::disk('public')->makeDirectory('products');

        $categoryIds = Category::query()->pluck('id', 'slug');

        $products = [
            [
                'category' => 'semen-mortar',
                'name' => 'Semen Portland PCC 50kg SNI',
                'description' => 'Semen Portland Composite Cement (PCC) dengan daya rekat ekstra kuat dan hasil akhir halus tanpa retak rambut. Ideal untuk pengecoran pondasi, struktur balok beton, pasangan bata, dan plesteran dinding.',
                'price' => 68000,
                'image' => 'semen-portland-50kg.png',
            ],
            [
                'category' => 'semen-mortar',
                'name' => 'Mortar Perekat Bata Ringan ThinBed 40kg',
                'description' => 'Semen instan siap pakai formula khusus untuk perekat bata ringan (AAC/hebel). Cukup ditambah air, berdaya rekat superior dengan ketebalan aplikasi tipis 3mm sehingga pengerjaan dinding lebih cepat dan hemat biaya.',
                'price' => 85000,
                'image' => 'mortar-perekat-hebel.svg',
            ],
            [
                'category' => 'besi-baja-ringan',
                'name' => 'Besi Beton Ulir D13 SNI Full (12 Meter)',
                'description' => 'Besi beton ulir berstandar resmi SNI 2052:2017 berdiameter 13mm panjang utuh 12 meter. Memiliki batas luluh tinggi, daya cengkeram beton maksimal, sangat kokoh untuk struktur kolom gedung dan sloof pondasi.',
                'price' => 135000,
                'image' => 'besi-beton-ulir-d13.svg',
            ],
            [
                'category' => 'besi-baja-ringan',
                'name' => 'Baja Ringan Canal C75.75 ZincAlum (6 Meter)',
                'description' => 'Rangka atap baja ringan profil C ukuran 75x75 dengan ketebalan 0.75mm berbahan dasar baja ZincAlum anti karat. Presisi dimensi tinggi, ringan, tahan rayap serta api, dan kuat menahan beban genteng berat.',
                'price' => 92000,
                'image' => 'baja-ringan-canal-c75.jpg',
            ],
            [
                'category' => 'bata-material-dasar',
                'name' => 'Bata Merah Press Bakar Super (Per 1.000 Pcs)',
                'description' => 'Bata merah press bakar kualitas super dengan tingkat kepadatan tinggi, presisi, kokoh, dan tahan rembesan air. Sangat ideal untuk dinding rumah tinggal, ruko, pagar keliling, dan konstruksi gedung.',
                'price' => 750000,
                'image' => 'bata-merah-press.png',
            ],
            [
                'category' => 'cat-pelapis',
                'name' => 'Cat Waterproofing Pelapis Anti Bocor 20kg',
                'description' => 'Cat pelapis anti bocor berbahan dasar elastomerik akrilik kedap air elastis hingga 400%. Sangat efektif menutup retak rambut dak beton, dinding samping luar rumah, talang air, dan sambungan atap dari kebocoran.',
                'price' => 890000,
                'image' => 'cat-waterproofing-20kg.jpg',
            ],
            [
                'category' => 'cat-pelapis',
                'name' => 'Cat Tembok Eksterior WeatherShield 20 Liter',
                'description' => 'Cat pelindung dinding eksterior premium dengan teknologi UV-Reflect untuk menjaga suhu ruangan lebih sejuk. Anti lumut, anti jamur, tahan cuaca tropis ekstrem hingga 8 tahun tanpa memudar.',
                'price' => 1450000,
                'image' => 'cat-eksterior-weathershield.svg',
            ],
            [
                'category' => 'keramik-granit',
                'name' => 'Granit Tile Glazed Polished 60x60 Royal White (1 Dus)',
                'description' => 'Lantai granit tile porcelain glazed polished motif marmer carara mewah ukuran 60x60 cm (isi 4 lembar / 1.44 m²). Permukaan nano-gloss kilap tinggi, anti gores, tahan noda cairan, dan mudah dibersihkan.',
                'price' => 215000,
                'image' => 'granit-tile-60x60.jpg',
            ],
            [
                'category' => 'atap-pipa',
                'name' => 'Pipa PVC AW 3 Inch SNI (Panjang 4 Meter)',
                'description' => 'Pipa PVC berstandar SNI kelas AW untuk saluran air bersih utama dan drainase bertekanan tinggi hingga 10 bar. Dinding pipa tebal, bebas timbal racun, anti korosi kimia, dan kuat terhadap tekanan tanah.',
                'price' => 110000,
                'image' => 'pipa-pvc-aw-3inch.jpg',
            ],
            [
                'category' => 'atap-pipa',
                'name' => 'Atap Spandek Zincalume Tebal 0.35mm (Lebar 1m)',
                'description' => 'Lembaran seng atap gelombang zincalume dengan ketebalan 0.35mm. Sangat tahan korosi dan karat, ringan sehingga menghemat struktur rangka, serta cocok untuk kanopi garasi, gudang, pabrik, maupun hunian modern.',
                'price' => 58000,
                'image' => 'atap-spandek-zincalume.svg',
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
