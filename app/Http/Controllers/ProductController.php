<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('images')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $categories = Product::select('category')
            ->distinct()
            ->whereNotNull('category')
            ->pluck('category');

        // Create a page object for SEO
        $page = (object) [
            'title' => 'Our Products',
            'meta_title' => 'Our Products - Sun Frozen',
            'meta_description' => 'Discover our high-quality frozen vegetables, frozen berries, and frozen fruits. Premium quality products from PT Suryatama Usaha Nusantara.',
            'meta_keywords' => 'frozen products, frozen vegetables, frozen berries, frozen fruits, Sun Frozen products'
        ];

        return view('products.index', compact('products', 'categories', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products',
            'short_description' => 'nullable|string|max:500',
            'category' => 'nullable|string|max:255',
            'detail_name' => 'nullable|string|max:255',
            'detail_desc' => 'nullable|string',
            'detail_size' => 'nullable|array',
            'detail_packing' => 'nullable|array',
            'detail_certificate' => 'nullable|array',
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string',
        ]);

        $product = Product::create($validated);

        return redirect()->route('products.show', $product)
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load('images');
        
        // Create a page object for SEO using product data
        $page = (object) [
            'title' => $product->name,
            'meta_title' => $product->meta_title ?? $product->name . ' - Sun Frozen',
            'meta_description' => $product->meta_description ?? $product->short_description ?? 'High-quality ' . $product->name . ' from Sun Frozen. Premium frozen products from PT Suryatama Usaha Nusantara.',
            'meta_keywords' => $product->meta_keywords ?? $product->name . ', frozen products, Sun Frozen, ' . $product->category
        ];
        
        return view('products.show', compact('product', 'page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $product->id,
            'short_description' => 'nullable|string|max:500',
            'category' => 'nullable|string|max:255',
            'detail_name' => 'nullable|string|max:255',
            'detail_desc' => 'nullable|string',
            'detail_size' => 'nullable|array',
            'detail_packing' => 'nullable|array',
            'detail_certificate' => 'nullable|array',
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string',
        ]);

        $product->update($validated);

        return redirect()->route('products.show', $product)
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
