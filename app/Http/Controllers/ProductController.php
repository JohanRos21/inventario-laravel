<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')
            ->latest()
            ->paginate(10);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'minimum_stock' => 'required|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        Product::create($validated);

        return redirect()
            ->route('products.index')
            ->with('success', 'Producto creado correctamente.');
    }

    public function edit(Product $product)
    {
        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'minimum_stock' => 'required|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $product->update($validated);

        return redirect()
            ->route('products.index')
            ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Producto eliminado correctamente.');
    }

   public function lowStock()
   {
    $products = Product::with('category')
        ->whereColumn('stock', '<=', 'minimum_stock')
        ->latest()
        ->paginate(10);

    return view('products.low-stock', compact('products'));
}
}