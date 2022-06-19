<?php

namespace App\Http\Controllers\Admin;

use App\Models\Price;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index()
    {
        return Price::all();
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'price' => 'required',
        ]);

        $price = Price::find($id);

        $price->price = $request->price;

        $price->save();
    }
}
