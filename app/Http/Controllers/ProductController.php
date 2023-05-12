<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //get all products
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'products' => $products,
        ], 200);
    }

    //get single product
    public function show($id)
    {
        $product = Product::find($id);
        return response([
            'product' => $product,
        ], 200);
    }

    //create a Product
    public function store(Request $request)
    {
        //validate fields
        $attrs = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer',
            'stars' => 'required|integer',
            'location' => 'required|string',
        ]);


        $product = Product::create([
            'name' => $attrs['name'],
            'description' => $attrs['description'],
            'price' => $attrs['price'],
            'stars' => $attrs['stars'],
            'location' => $attrs['location'],
        ]);

        return response([
            'message' => 'Product created.',
            'product' => $product
        ], 200);
    }

    //update a product
    public function update(Request $request, $id)
    {

        $product = Product::find($id);

        if(!$product)
        {
            return response([
                'message' => 'Product not found.'
            ], 403);
        }

        //validate fields
        $attrs = $request->validate([
            'name' => 'string|max:255',
            'description' => 'string',
            'price' => 'numeric|between:0.00,9999999.99',
            'stars' => 'integer',
            'location' => 'string',
        ]);

        $image = $this->saveImage($request->image, 'profiles');

        $product->update([
            'name' => $attrs['name'],
            'description' => $attrs['description'],
            'image' => $image,
            'price' => $attrs['price'],
            'stars' => $attrs['stars'],
            'location' => $attrs['location'],
        ]);

        return response([
            'message' => 'Product updated.',
            'product' => $product
        ], 200);
    }
    
    public function destroy($id)
    {
        $product = Product::find($id);

        if(!$product)
        {
            return response([
                'message' => 'Product not found.'
            ], 403);
        }

        $product->delete();

        return response([
            'message' => 'Product deleted.'
        ], 200);
    }
}
