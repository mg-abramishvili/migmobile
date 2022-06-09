<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Http\Resources\SettingResource;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return new SettingResource(Setting::find(1));
    }
}
