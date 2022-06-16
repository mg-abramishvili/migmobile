<?php

namespace App\Imports;

use App\Models\Number;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToModel;

class NumberImport implements ToModel
{
    public function model(array $row)
    {
        $request = request()->all();

        return new Number([
            'number' => $row[1],
            'serial_number' => $row[0],
            'plan_id' => $request['plan_id'],
        ]);
    }
}
