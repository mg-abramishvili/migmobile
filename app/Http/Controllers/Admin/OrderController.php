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
}
