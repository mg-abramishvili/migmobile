<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        return Plan::withCount('numbers')->get();
    }

    public function plan($id)
    {
        return Plan::find($id);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'name_ru' => 'required',
            'name_uz' => 'required',
            'name_tj' => 'required',
            'min' => 'required',
            'gb' => 'required',
            'days' => 'required',
            'in_stock' => 'required',
        ]);

        $plan = Plan::find($id);

        $plan->name = $request->name;
        $plan->name_ru = $request->name_ru;
        $plan->name_uz = $request->name_uz;
        $plan->name_tj = $request->name_tj;
        $plan->min = $request->min;
        $plan->gb = $request->gb;
        $plan->days = $request->days;
        $plan->in_stock = $request->in_stock;

        $plan->save();
    }
}
