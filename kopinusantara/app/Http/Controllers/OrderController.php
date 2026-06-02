<?php

namespace App\Http\Controllers;

use App\Http\Resources\Order\OrderIndexResource;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request) {
        $user = $request->user();

        $order = Order::where('user_id', $user->id, null, null)->first();

        $orders = OrderDetail::where('order_id', $order->id, null, null)->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Get all orders success',
	    'data' => [
		'total_amount' => $order->total_amount,
		'payment_method' => $order->payment_method,
		'status' => $order->status,
                'orders' => OrderIndexResource::collection($orders)
            ]
        ]);
    }

    public function store(Request $request) {
        $user = $request->user();

        $checkAlready = Order::where('user_id', $user->id, null, null)->first();

        if ($checkAlready) {
            return response()->json([
                'status' => 'error',
                'message' => 'Order has been created before'
            ], 409);
        }

        $order = Order::create([
            'user_id' => $user->id,
            'order_date' => now(),
            'status' => 'pending'
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Add order success',
            'data' => $order
        ]);
    }
}
