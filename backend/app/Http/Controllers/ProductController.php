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
        return response()->json([
            'message' => 'Création produit à implémenter.',
        ], 201);
    }

    public function show(Product $product)
    {
        return response()->json($product->load('variants'));
    }

    public function update(Request $request, Product $product)
    {
        return response()->json([
            'message' => 'Mise à jour produit à implémenter.',
        ]);
    }

    public function destroy(Product $product)
    {
        return response()->json([
            'message' => 'Suppression produit à implémenter.',
        ]);
    }
}
