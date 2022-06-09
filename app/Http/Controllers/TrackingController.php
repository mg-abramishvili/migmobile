<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index(Request $request)
    {
        return Order::query()
            ->where('id', $request->order_id)
            ->where('last_name', $request->last_name)
            ->first();
    }
}
