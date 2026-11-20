<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicController extends Controller
{
    /**
     * Show the landing page with the business profile and product catalog.
     */
    public function index(Request $request): View
    {
        $selectedSlug = trim($request->string('category')->toString());

        $categories = Category::query()
            ->withCount('products')
            ->orderBy('name')
            ->get();

        $selectedCategory = $selectedSlug !== ''
            ? $categories->firstWhere('slug', $selectedSlug)
            : null;

        $productsQuery = Product::query()->with('category');

        if ($selectedCategory !== null) {
            $productsQuery->whereBelongsTo($selectedCategory);
        }

        $products = $productsQuery
            ->latest()
            ->paginate(9)
            ->withQueryString();

        $featuredProducts = Product::query()
            ->with('category')
            ->latest()
            ->take(3)
            ->get();

        return view('public.home', [
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
            'products' => $products,
            'featuredProducts' => $featuredProducts,
            'totalProducts' => Product::query()->count(),
            'totalCategories' => $categories->count(),
        ]);
    }

    /**
     * Show a single product with its category and related products.
     */
    public function show(Product $product): View
    {
        $product->load('category');

        $relatedProducts = Product::query()
            ->with('category')
            ->where('category_id', $product->category_id)
            ->whereKeyNot($product->getKey())
            ->take(3)
            ->get();

        return view('public.show', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }
}
