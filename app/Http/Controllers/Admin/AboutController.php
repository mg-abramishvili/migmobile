<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return About::find(1);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'ru' => 'required',
            'uz' => 'required',
            'tj' => 'required',
        ]);

        $about = About::find(1);

        $about->ru = $request->ru;
        $about->uz = $request->uz;
        $about->tj = $request->tj;
        
        $about->save();
    }
}
