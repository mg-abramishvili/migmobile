<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'subject' => 'required',
        ]);

        $lead = new Lead();

        $lead->name = $request->name;
        $lead->phone = $request->phone;
        $lead->subject = $request->subject;

        $lead->save();
    }
}
