<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Number;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'numbers' => 'required',
        ]);

        $numbers = $request->numbers;

        $order = new Order();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->is_paid = false;
        $order->save();

        foreach($numbers as $nm)
        {
            $number = Number::where('number', $nm)->first();
            $number->order_id = $order->id;
            $number->save();
        }

        return $order->id;
    }
}
