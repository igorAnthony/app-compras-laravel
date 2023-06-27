<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return response()->json([
            'category' => $categories,
        ], 200);
    }

    public function show($id)
    {
        $category = Category::find($id);
        if(!$category)
        {
            return response([
                'message' => 'Category not found.'
            ], 404);
        }
        return response([
            'category' => $category,
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::create([
            'name' => $request->input('name'),
        ]);

        return response()->json(['message' => 'Category created with success', 'category' => $category], 200);
    }

    public function update(Request $request, $id)
    {
        $attrs = $request;

        $category = Category::find($id);

        if(!$category)
        {
            return response([
                'message' => 'Category not found.'
            ], 404);
        }

        $category->update([
            'name' => $attrs['name'] ?? $category->name,
        ]);
        

        return response([
            'message' => 'Category updated.',
        ], 200);
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if(!$category)
        {
            return response([
                'message' => 'Category not found.'
            ], 404);
        }

        $category->delete();

        return response([
            'message' => 'Category deleted.'
        ], 200);
    }
}
