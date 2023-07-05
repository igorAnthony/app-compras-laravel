<?php

namespace App\Http\Controllers;

use App\Events\OrdersEvent;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use App\Models\Orders;
use App\Models\OrdersItems;

class OrdersItemsController extends Controller
{
    public function index()
    {
        $items = OrdersItems::get();

        if($items->isEmpty()) {
            return response()->json(['message' => 'Items not found'], 404);
        }

        return response()->json([
            'ordersitems' => $items
        ], 200);
    }
    public function store(Request $request, $orderId)
    {
        $items = $request->input('items');

        if (empty($items)) {
            return response()->json(['message' => 'Items not found'], 404);
        }

        $orderItems = [];
        foreach ($items as $item) {
            $productId = $item['product_id'];
            $quantity = $item['quantity'];
            $totalPrice = $item['total_price'];

            $orderItems[] = [
                'order_id' => $orderId,
                'product_id' => $productId,
                'quantity' => $quantity,
                'total_price' => $totalPrice
            ];
        }

        OrdersItems::insert($orderItems);

        return response()->json(['message' => 'Order items created successfully'], 200);
    }
    public function show($order_id)
    {
        $items = OrdersItems::where('order_id', $order_id)->get();

        if($items->isEmpty()) {
            return response()->json(['message' => 'Items not found'], 404);
        }

        $productInfo = [];

        foreach ($items as $item) {
            $product = Products::where('id', $item->product_id)->first();
            $productQuantity = $item->quantity;
            $productPrice = $item->quantity * $product->price;
            $productInfo[] = [
                'product_id' => $item->product_id,
                'product_name'=>$product->name,
                //'img'->$product->img,
                'quantity' => $productQuantity,
                'total_price' => $productPrice
            ];
        }

        return response()->json([
            'paymentvoucher' => $productInfo
        ], 200);
    }



    public function popularItems()
    {
        $limit = 5;
        $i = 0;
        $items = OrdersItems::select('product_id', DB::raw('SUM(quantity) as total_quantity'))
            ->groupBy('product_id')
            ->orderByDesc('total_quantity')
            ->get();

        $products = [];

        foreach ($items as $item) {
            $i++;
            $product = Products::where('id', $item->product_id)->where('visibility', '1')->first();
            $products[] = $product;
            if($i >= $limit){
                return response()->json([
                    'products' => $products
                ], 200);
            }
            
        }

        return response()->json([
            'products' => $products
        ], 200);
    }

    public function recommendedItems($user_id)
    {
        $items = OrdersItems::select('product_id', DB::raw('SUM(quantity) as total_quantity'))
            ->whereIn('order_id', function ($query) use ($user_id) {
                $query->select('id')
                    ->from('orders')
                    ->where('customer_id', $user_id);
            })
            ->groupBy('product_id')
            ->orderByDesc('total_quantity')
            ->get();

        $products = [];

        foreach ($items as $item) {
            $product = Products::where('id', $item->product_id)->where('visibility', '1')->first();
            $products[] = $product;
        }

        return response()->json([
            'products' => $products
        ], 200);
    }


}
