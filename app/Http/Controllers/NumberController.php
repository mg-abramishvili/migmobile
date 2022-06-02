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
            'beeline' => $numbers->where('provider', 'beeline')->pluck('number'),
            'mts' => $numbers->where('provider', 'mts')->pluck('number'),
            'megafon' => $numbers->where('provider', 'megafon')->pluck('number'),
            'tele2' => $numbers->where('provider', 'tele2')->pluck('number'),
        ]);
    }
}
