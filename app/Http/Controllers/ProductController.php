<?php

namespace App\Http\Controllers;

use App\Events\OrdersEvent;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class ProductController extends Controller
{
    //get all products
    public function index()
    {
        $products = Products::all();
        return response()->json([
            'products' => $products,
        ], 200);
    }

    //get single product
    public function show($id)
    {
        $product = Products::find($id);
        if(!$product)
        {
            return response([
                'message' => 'Product not found.'
            ], 404);
        }
        return response([
            'product' => $product,
        ], 200);
    }

    //create a Product
    public function store(Request $request)
    {
        $product = new Products();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->id_category = $request->input('id_category');
        $product->image = $request->input('image');
        $product->price = $request->input('price');
        $product->stars = $request->input('stars', 3); // Valor padrão: 3
        $product->location = $request->input('location', 'Toledo, PR'); // Valor padrão: 'Toledo, PR'
        $product->visibility = $request->input('visibility', '1'); // Valor padrão: '1'
        
        $product->save();
        
        return response()->json([
            'message' => 'Produto criado com sucesso',
            'product' => $product
        ]);
    }

    //update a product
    public function update(Request $request, $id)
    {
        $attrs = $request;

        $product = Products::find($id);

        if(!$product)
        {
            return response([
                'message' => 'Product not found.'
            ], 404);
        }

        //$image = $this->saveImage($request->image, 'profiles');

        $product->update([
            'name' => $attrs['name'] ?? $product->name,
            'description' => $attrs['description'] ?? $product->description,
            'id_category' => $attrs['id_category'] ?? $product->id_category,
            'price' => $attrs['price'] ?? $product->price,
            'visibility' => $attrs['visibility'] ?? $product->visibility,
        ]);
        

        return response([
            'product' => $product,
            'message' => 'Product updated.',
        ], 200);
    }
    public function changeVisibility($productId)
    {
        $product = Products::find($productId);
        if(!$product)
        {
            return response([
                'message' => 'Product not found.'
            ], 404);
        }
        // Verifica a visibilidade atual
        if ($product->visibility == '0') {
            // Se estiver oculto, torna visível
            $product->visibility = '1';
        } else {
            // Se estiver visível, torna oculto
            $product->visibility = '0';
        }
        
        $product->save();
        return response([
            'product' => $product,
        ], 200);
    }

    public function destroy($id)
    {
        $product = Products::find($id);

        if(!$product)
        {
            return response([
                'message' => 'Product not found.'
            ], 404);
        }

        $product->delete();

        return response([
            'message' => 'Product deleted.'
        ], 200);
    }

    
    //blade
    public function indexView()
    {
        $products = Products::all();

        return view('product.index', ['products' => $products]);
    }
    public function updateView(Request $request, $id)
    {
        $attrs = $request->all();

        $product = Products::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        //$image = $this->saveImage($request->image, 'profiles');

        $product->update([
            'name' => $attrs['name'] ?? $product->name,
            'description' => $attrs['description'] ?? $product->description,
            'id_category' => $attrs['id_category'] ?? $product->id_category,
            'price' => $attrs['price'] ?? $product->price,
            'visibility' => $attrs['visibility'] ?? $product->visibility,
        ]);

        return redirect()->route('admin.product.show', ['id' => $product->id])->with('success', 'Product updated.');
    }
    public function showView($id)
    {
        $product = Products::find($id);
        
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
        
        return view('product.show', compact('product'));
    }
    public function destroyView($id)
    {
        $product = Products::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $product->delete();

        return redirect()->route('admin.product.index')->with('success', 'Product deleted.');
    }
    // ...

    public function storeView(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            // Adicione validações para os outros campos do formulário
        ]);

        $product = new Products();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        // Atribua os outros campos do formulário ao modelo Product

        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Product created successfully');
    }

    // ...

}
