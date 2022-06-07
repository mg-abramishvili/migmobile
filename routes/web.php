<?php

use Illuminate\Support\Facades\Route;
use App\Models\News;
use App\Models\About;
use App\Models\BankCard;
use App\Models\Loan;
use App\Models\Plan;

Route::get('/', function () {
    $lang = session()->get('language');
    
    $about = About::find(1);
    $plans = Plan::all();
    $bankCard = BankCard::find(1);
    $loan = Loan::find(1);

    if($lang) {
        $news = News::where('lang', $lang)->take(8)->get();
    } else {
        $news = News::where('lang', 'ru')->take(8)->get();
    }

    return view('home', compact('news', 'about', 'bankCard', 'loan', 'plans'));
})->name('home');

Route::get('/avia', function() {
    return view('avia');
})->name('avia');

Route::get('/order', function() {
    return view('order');
})->name('order');

Route::get('/order-pretty', function() {
    return view('order-pretty');
})->name('order-pretty');

Route::get('/checkout', function() {
    return view('checkout');
})->name('checkout');

Route::get('/numbers/{digits}', [App\Http\Controllers\NumberController::class, 'index']);
Route::get('/_plans', [App\Http\Controllers\PlanController::class, 'index']);
Route::get('/_prices', [App\Http\Controllers\PriceController::class, 'index']);

Route::get('_cart', [App\Http\Controllers\OrderController::class, 'getCart']);
Route::post('_simple-cart', [App\Http\Controllers\OrderController::class, 'storeSimpleCart']);
Route::post('_pretty-cart', [App\Http\Controllers\OrderController::class, 'storePrettyCart']);

Route::post('_order', [App\Http\Controllers\OrderController::class, 'store']);
Route::get('order-confirmed/{uid}', [App\Http\Controllers\OrderController::class, 'orderConfirmed']);

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

// ADMIN SETTINGS
Route::get('_admin/settings', [App\Http\Controllers\Admin\SettingController::class, 'index']);
Route::post('_admin/settings', [App\Http\Controllers\Admin\SettingController::class, 'update']);

// ADMIN ABOUT
Route::get('_admin/about', [App\Http\Controllers\Admin\AboutController::class, 'index']);
Route::post('_admin/about', [App\Http\Controllers\Admin\AboutController::class, 'update']);

// ADMIN LEADS
Route::get('_admin/leads', [App\Http\Controllers\Admin\LeadController::class, 'index']);
Route::get('_admin/lead/{id}', [App\Http\Controllers\Admin\LeadController::class, 'lead']);

// ADMIN NUMBERS
Route::get('_admin/numbers', [App\Http\Controllers\Admin\NumberController::class, 'index']);
Route::post('_admin/numbers', [App\Http\Controllers\Admin\NumberController::class, 'store']);
Route::get('_admin/number/{id}', [App\Http\Controllers\Admin\NumberController::class, 'number']);


// AUTH
require __DIR__.'/auth.php';