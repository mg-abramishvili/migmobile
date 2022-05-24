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
        $this->validate($request, [
            'number' => 'required',
            'provider' => 'required',
            'is_pretty' => 'required',
        ]);

        $number = new Number();

        $number->number = $request->number;
        $number->provider = $request->provider;
        $number->is_pretty = $request->is_pretty;

        $number->save();
    }
}
