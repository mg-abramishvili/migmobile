<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return Order::orderBy('created_at', 'desc')->get();
    }

    public function order($id)
    {
        return Order::find($id);
    }

    public function update($id, Request $request)
    {
        $order = Order::find($id);

        $order->delivery_name = $request->delivery_name;
        $order->delivery_track_number = $request->delivery_track_number;
        
        $order->save();
    }
}
