<?php

namespace App\Http\Controllers\Admin;

use App\Models\Number;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NumberController extends Controller
{
    public function index()
    {
        return Number::all();
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
            $number->provider = $nm['provider'];
            $number->serial_number = $nm['serial_number'];
            $number->is_pretty = false;
    
            $number->save();
        }
    }
}
