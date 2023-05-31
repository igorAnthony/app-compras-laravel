<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return response()->json([
            'categories' => $categories,
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
            'categories' => $category,
        ], 200);
    }

    public function store(Request $request)
    {
        $attrs = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer',
            //'stars' => 'required|integer',
            //'location' => 'required|string',
        ]);


        $category = Category::create([
            'name' => $attrs['name'],
            'description' => $attrs['description'],
            'price' => $attrs['price'],
        ]);

        return response([
            'categories' => $category,
            'message' => 'Category created.',
        ], 200);
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

        //$image = $this->saveImage($request->image, 'profiles');

        $category->update([
            'name' => $attrs['name'] ?? $category->name,
            'description' => $attrs['description'] ?? $category->description,
            'price' => $attrs['price'] ?? $category->price,
            'visibility' => $attrs['visibility'] ?? $category->visibility
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
