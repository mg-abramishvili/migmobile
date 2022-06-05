<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return Setting::find(1);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'yookassa_shop_id' => 'required',
            'yookassa_secret_key' => 'required',
        ]);

        $settings = Setting::find(1);

        $settings->yookassa_shop_id = $request->yookassa_shop_id;
        $settings->yookassa_secret_key = $request->yookassa_secret_key;
        
        $settings->save();
    }
}
