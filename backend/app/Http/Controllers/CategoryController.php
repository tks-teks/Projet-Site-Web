<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(Category::with('children')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'parent_id' => 'nullable|integer',
            'description' => 'nullable|string',
        ]);

        $category = Category::create($validated);

        return response()->json($category, 201);
    }

    public function show(Category $category)
    {
        return response()->json($category->load('children'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'slug' => 'sometimes|string|max:255|unique:categories,slug,' . $category->id,
            'parent_id' => 'nullable|integer',
            'description' => 'nullable|string',
        ]);

        $category->update($validated);

        return response()->json($category->refresh());
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(['message' => 'Catégorie supprimée.']);
    }
}
