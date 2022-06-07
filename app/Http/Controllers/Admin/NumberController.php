<?php

namespace App\Http\Controllers\Admin;

use App\Models\Number;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NumberController extends Controller
{
    public function index()
    {
        return Number::where('order_id', null)->with('plan')->get();
    }

    public function store(Request $request)
    {
        $numbers = $request->numbers;
        
        $this->validate($request, [
            'numbers' => 'required',
        ]);

        foreach($numbers as $nm)
        {
            $number = new Number();
    
            $number->number = $nm['number'];
            $number->serial_number = $nm['serial_number'];
            $number->plan_id = $nm['plan_id'];
    
            $number->save();
        }
    }
}
