<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function store(Request $request) {
        $user = $request->user();

        // $order = Order::where('user_id', $user->id, null, null)->first() ? Order::where('user_id', $user->id, null, null)->first() : Order::create([
        //     'user_id' => $user->id,
        //     'order_date' => now(),
        //     'status' => 'pending'
        // ]);

        $order = Order::where('user_id', $user->id, null, null)->first() ?? Order::create([
            'user_id' => $user->id,
            'order_date' => now(),
            'status' => 'pending'
        ]);

        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer'
        ]);

        if (OrderDetail::where('product_id', $validated['product_id'])->where('order_id', $order->id)->exists()) {
            return response()->json([
                'status' => 'error',
                'message' => 'This product already added in cart'
            ], 409);
        }

        $product = Product::where('id', $validated['product_id'], null, null)->first();

        $order_detail = OrderDetail::create([
            'order_id' => $order->id,
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
            'unit_price' => $product->price,
            'subtotal' => $product->price * $validated['quantity']
        ]); 

        return response()->json([
            'status' => 'success',
            'message' => 'Add order detail success',
            'data' => $order_detail
        ], 201);
    }
}
