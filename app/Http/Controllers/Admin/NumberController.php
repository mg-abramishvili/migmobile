<?php

namespace App\Http\Controllers\Admin;

use App\Models\Number;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\NumberImport;
use App\Exports\NumberExport;
use Maatwebsite\Excel\Facades\Excel;

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

    public function import(Request $request)
    {
        Excel::import(new NumberImport, $request->file);

        return response('Success', 200);
    }

    public function export($plan)
    {
        return (new NumberExport($plan))->download('numbers_export_' . $plan . '.xlsx');
    }

    public function filter(Request $request)
    {
        $numbers = Number::query();

        $numbers->when($request->number, function ($q) use($request) {
            return $q->where('number', 'LIKE', '%' . $request->number . '%');
        });

        $numbers->when($request->serial_number, function ($q) use($request) {
            return $q->where('serial_number', 'LIKE', '%' . $request->serial_number . '%');
        });

        $numbers->when($request->plan_id, function ($q) use($request) {
            return $q->where('plan_id', $request->plan_id);
        });

        return $numbers->with('plan')->get();
    }

    public function delete(Request $request)
    {
        $numbers = $request->numbers;

        foreach($numbers as $nm)
        {
            $number = Number::find($nm);
            $number->delete();
        }
    }
}
