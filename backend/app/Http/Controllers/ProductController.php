<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::with('variants')->paginate(20));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'description' => 'nullable|string',
            'category_id' => 'nullable|integer',
            'status' => 'nullable|string',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'variants' => 'array',
            'variants.*.sku' => 'required_with:variants|string|max:255',
            'variants.*.attributes' => 'required_with:variants|array',
            'variants.*.price' => 'required_with:variants|numeric',
            'variants.*.stock' => 'required_with:variants|integer|min:0',
        ]);

        $product = Product::create($validated);

        if (!empty($validated['variants'])) {
            $product->variants()->createMany($validated['variants']);
        }

        return response()->json($product->load('variants'), 201);
    }

    public function show(Product $product)
    {
        return response()->json($product->load('variants'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'slug' => 'sometimes|string|max:255|unique:products,slug,' . $product->id,
            'description' => 'nullable|string',
            'category_id' => 'nullable|integer',
            'status' => 'nullable|string',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
        ]);

        $product->update($validated);

        return response()->json($product->refresh()->load('variants'));
    }

    public function destroy(Product $product)
    {
        return response()->json([
            'message' => 'Suppression produit à implémenter.',
        ]);
    }
}
