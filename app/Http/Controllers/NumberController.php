<?php

namespace App\Http\Controllers;

use App\Models\Number;
use Illuminate\Http\Request;

class NumberController extends Controller
{
    public function index($digits)
    {
        $numbers = Number::where('number', 'LIKE', '%' . $digits . '%')->where('order_id', null)->get();

        return response()->json([
            'beeline' => $numbers->pluck('number'),
            'mts' => $numbers->pluck('number'),
            'megafon' => $numbers->pluck('number'),
            'tele2' => $numbers->pluck('number'),
        ]);
    }
}
