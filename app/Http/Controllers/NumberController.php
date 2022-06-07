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
            'beeline' => $numbers->where('plan_id', 1)->pluck('number'),
            'mts' => $numbers->where('plan_id', 2)->pluck('number'),
            'megafon' => $numbers->where('plan_id', 3)->pluck('number'),
            'tele2' => $numbers->where('plan_id', 4)->pluck('number'),
        ]);
    }
}
