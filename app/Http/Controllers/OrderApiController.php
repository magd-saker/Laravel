<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderItems;
use App\Models\Product;

class OrderApiController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer')->get();

        return response()->json([
            'orders' => $orders,
        ]);
    }
}
