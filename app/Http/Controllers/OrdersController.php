<?php

namespace App\Http\Controllers;

use App\Events\OrdersEvent;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Orders;
use App\Models\OrdersItems;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Orders::all();

        return response()->json(['orders' => $orders], 200);
    }

    public function show($customerId)
    {
        $orders = Orders::where('customer_id', $customerId)->get();

        return response()->json([
            'orders' => $orders
        ], 200);
    }

    // public function store(Request $request)
    // {   
    //     $validatedData = $request->validate([
    //         'customer_id' => 'required|integer|exists:users,id',
    //         'items.*.product_id' => 'required|integer|exists:products,id',
    //         'items.*.quantity' => 'required|integer',
    //     ]);

    //     $order = new Orders();
    //     $order->customer_id = $validatedData['customer_id'];
    //     $order->total_amount = 0;
    //     $order->created_at = Carbon::now();
    //     $order->save();
    //     // Calculate the total amount based on the items in the order
    //     $totalAmount = 0;
    //     foreach ($validatedData['items'] as $itemData) {
    //         $product = Product::find($itemData['product_id']);
    //         $totalAmount += $product->price * $itemData['quantity'];
    //         $orderItem = new OrdersItems();
    //         $orderItem->order_id = $order->id;
    //         $orderItem->product_id = $product->id;
    //         $orderItem->quantity = $itemData['quantity'];
    //         $orderItem->total_price = $product->price * $itemData['quantity'];
    //         $orderItem->save();
    //     }

    //     $order->total_amount = $totalAmount;
    //     $order->save();

    //     return response()->json([
    //         'message' => 'Order created successfully.',
    //         'order' => $order
    //     ], 201);
    // }
    public function store(Request $request)
    {
        $customerId = $request->input('customer_id');
        $totalAmount = $request->input('total_amount');

        try {
            $orderId = DB::table('orders')->insertGetId([
                'customer_id' => $customerId,
                'total_amount' => $totalAmount
            ]);
            
            return response()->json(['order_id' => $orderId], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create order'], 500);
        }
    }

    public function updateStatus(Request $request)
    {
        $orderId = $request->input('order_id');
        $customerId = $request->input('customer_id');
        $newStatus = $request->input('new_status');
        
        $order = Orders::where('id', $orderId)
                        ->where('customer_id', $customerId)
                        ->first();

        if(!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->status = $newStatus;
        $order->save();

        return response()->json(['message' => 'Order status updated successfully'], 200);
    }
}
