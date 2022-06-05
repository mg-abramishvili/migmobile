<?php

use Illuminate\Support\Facades\Route;
use App\Models\News;

Route::get('/', function () {
    $lang = session()->get('language');

    if($lang) {
        $news = News::where('lang', $lang)->get();
    } else {
        $news = News::where('lang', 'ru')->get();
    }

    return view('home', compact('news'));
})->name('home');

Route::get('/avia', function() {
    return view('avia');
})->name('avia');

Route::get('/order', function() {
    return view('order');
})->name('order');

Route::get('/numbers/{digits}', [App\Http\Controllers\NumberController::class, 'index']);

Route::get('_cart', [App\Http\Controllers\OrderController::class, 'getCart']);
Route::post('_cart', [App\Http\Controllers\OrderController::class, 'storeCart']);

Route::post('_order', [App\Http\Controllers\OrderController::class, 'store']);
Route::get('order-confirmed/{uid}', [App\Http\Controllers\OrderController::class, 'order']);

Route::post('_leads', [App\Http\Controllers\LeadController::class, 'store']);

// ADMIN
Route::get('admin', function () {
    return view('layouts.admin');
})->middleware(['auth']);

Route::prefix("admin")->middleware(['auth'])->group(function() {
    Route::get('{any}', function () {
        return view('layouts.admin');
    })->where('any', '.*');
});

// ADMIN LEADS
Route::get('_admin/leads', [App\Http\Controllers\Admin\LeadController::class, 'index']);
Route::get('_admin/lead/{id}', [App\Http\Controllers\Admin\LeadController::class, 'lead']);

// ADMIN NUMBERS
Route::get('_admin/numbers', [App\Http\Controllers\Admin\NumberController::class, 'index']);
Route::post('_admin/numbers', [App\Http\Controllers\Admin\NumberController::class, 'store']);
Route::get('_admin/number/{id}', [App\Http\Controllers\Admin\NumberController::class, 'number']);


// AUTH
require __DIR__.'/auth.php';