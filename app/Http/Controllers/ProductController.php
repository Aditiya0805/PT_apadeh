<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display the product administration table.
     */
    public function index(Request $request): View
    {
        $search = trim($request->string('search')->toString());

        $productsQuery = Product::query()->with('category');

        if ($search !== '') {
            $productsQuery->where(function (Builder $query) use ($search): void {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhereHas('category', function (Builder $categoryQuery) use ($search): void {
                        $categoryQuery->where('name', 'like', "%{$search}%");
                    });
            });
        }

        return view('admin.products.index', [
            'products' => $productsQuery->latest()->paginate(8)->withQueryString(),
            'search' => $search,
            'productCount' => Product::query()->count(),
            'categoryCount' => Category::query()->count(),
        ]);
    }

    /**
     * Show the form for creating a new product.
     */
    public function create(): View
    {
        return view('admin.products.create', [
            'categories' => Category::query()->orderBy('name')->get(),
        ]);
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateProductData($request);
        $validated['image'] = $request->file('image')->store('products', 'public');

        Product::query()->create($validated);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk baru berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product): View
    {
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::query()->orderBy('name')->get(),
        ]);
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $this->validateProductData($request, $product);
        $previousImage = $product->image;

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        if (isset($validated['image']) && $previousImage !== null) {
            Storage::disk('public')->delete($previousImage);
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified product and its stored image.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $imagePath = $product->image;

        $product->delete();

        if ($imagePath !== null) {
            Storage::disk('public')->delete($imagePath);
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }

    /**
     * Validate product form data from the server side.
     *
     * @return array<string, mixed>
     */
    private function validateProductData(Request $request, ?Product $product = null): array
    {
        return $request->validate(
            [
                'category_id' => ['required', 'integer', 'exists:categories,id'],
                'name' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:2000'],
                'price' => ['required', 'numeric', 'min:0', 'max:9999999999'],
                'image' => [
                    $product === null ? 'required' : 'nullable',
                    'image',
                    'mimes:jpg,jpeg,png',
                    'max:2048',
                ],
            ],
            [
                'category_id.required' => 'Kategori wajib dipilih.',
                'category_id.exists' => 'Kategori yang dipilih tidak tersedia.',
                'name.required' => 'Nama produk wajib diisi.',
                'name.max' => 'Nama produk maksimal 255 karakter.',
                'description.required' => 'Deskripsi produk wajib diisi.',
                'description.max' => 'Deskripsi produk maksimal 2.000 karakter.',
                'price.required' => 'Harga produk wajib diisi.',
                'price.numeric' => 'Harga harus berupa angka tanpa titik atau koma.',
                'price.min' => 'Harga tidak boleh bernilai negatif.',
                'price.max' => 'Harga yang dimasukkan terlalu besar.',
                'image.required' => 'Foto produk wajib diunggah.',
                'image.image' => 'Foto produk harus berupa gambar.',
                'image.mimes' => 'Foto produk harus berformat JPG, JPEG, atau PNG.',
                'image.max' => 'Ukuran foto produk maksimal 2 MB.',
            ],
            [
                'category_id' => 'kategori',
                'name' => 'nama produk',
                'description' => 'deskripsi produk',
                'price' => 'harga',
                'image' => 'foto produk',
            ],
        );
    }
}
