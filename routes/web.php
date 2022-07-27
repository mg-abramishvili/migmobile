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
        $news = News::where('lang', $lang)->orderBy('created_at', 'desc')->take(8)->get();
    } else {
        $news = News::where('lang', 'ru')->orderBy('created_at', 'desc')->take(8)->get();
    }

    return view('home', compact('news', 'about', 'bankCard', 'loan', 'plans'));
})->name('home');

Route::get('/avia', function() {
    return view('avia');
})->name('avia');

Route::get('/news-all', function() {
    $lang = session()->get('language');

    if($lang) {
        $news = News::where('lang', $lang)->orderBy('created_at', 'desc')->get();
    } else {
        $news = News::where('lang', 'ru')->orderBy('created_at', 'desc')->get();
    }

    return view('news', compact('news'));
});

Route::get('/news/{id}', function($id) {
    $newsItem = News::find($id);
    return view('newsItem', compact('newsItem'));
});

Route::get('/order', function() {
    return view('order');
})->name('order');

Route::get('/order-pretty', function() {
    return view('order-pretty');
})->name('order-pretty');

Route::get('/checkout', function() {
    return view('checkout');
})->name('checkout');

Route::get('/tracking', function() {
    return view('tracking');
})->name('tracking');

Route::get('/policy', function() {
    return view('policy');
})->name('policy');

Route::get('/company', function() {
    return view('company-details');
})->name('company');

Route::get('/numbers/{digits}', [App\Http\Controllers\NumberController::class, 'index']);
Route::get('/_plans', [App\Http\Controllers\PlanController::class, 'index']);
Route::get('/_prices', [App\Http\Controllers\PriceController::class, 'index']);

Route::get('_cart', [App\Http\Controllers\OrderController::class, 'getCart']);
Route::get('_settings', [App\Http\Controllers\SettingController::class, 'index']);
Route::post('_simple-cart', [App\Http\Controllers\OrderController::class, 'storeSimpleCart']);
Route::post('_pretty-cart', [App\Http\Controllers\OrderController::class, 'storePrettyCart']);

Route::post('_order', [App\Http\Controllers\OrderController::class, 'store']);
Route::get('order-confirmed/{uid}', [App\Http\Controllers\OrderController::class, 'orderConfirmed']);
Route::post('order-notification-from-yookassa', [App\Http\Controllers\OrderController::class, 'notificationFromYookassa']);
Route::get('_tracking', [App\Http\Controllers\TrackingController::class, 'index']);

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
Route::get('_admin/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->middleware(['auth']);
Route::post('_admin/settings', [App\Http\Controllers\Admin\SettingController::class, 'update'])->middleware(['auth']);

// ADMIN ABOUT
Route::get('_admin/about', [App\Http\Controllers\Admin\AboutController::class, 'index'])->middleware(['auth']);
Route::post('_admin/about', [App\Http\Controllers\Admin\AboutController::class, 'update'])->middleware(['auth']);

// ADMIN LEADS
Route::get('_admin/leads', [App\Http\Controllers\Admin\LeadController::class, 'index'])->middleware(['auth']);
Route::get('_admin/lead/{id}', [App\Http\Controllers\Admin\LeadController::class, 'lead'])->middleware(['auth']);

// ADMIN ORDERS
Route::get('_admin/orders', [App\Http\Controllers\Admin\OrderController::class, 'index'])->middleware(['auth']);
Route::get('_admin/order/{id}', [App\Http\Controllers\Admin\OrderController::class, 'order'])->middleware(['auth']);
Route::put('_admin/order/{id}/update', [App\Http\Controllers\Admin\OrderController::class, 'update'])->middleware(['auth']);

// ADMIN PLANS
Route::get('_admin/plans', [App\Http\Controllers\Admin\PlanController::class, 'index'])->middleware(['auth']);
Route::get('_admin/plan/{id}', [App\Http\Controllers\Admin\PlanController::class, 'plan'])->middleware(['auth']);
Route::put('_admin/plan/{id}/update', [App\Http\Controllers\Admin\PlanController::class, 'update'])->middleware(['auth']);

// ADMIN PRICES
Route::get('_admin/prices', [App\Http\Controllers\Admin\PriceController::class, 'index'])->middleware(['auth']);
Route::put('_admin/price/{id}/update', [App\Http\Controllers\Admin\PriceController::class, 'update'])->middleware(['auth']);

// ADMIN NEWS
Route::get('_admin/news', [App\Http\Controllers\Admin\NewsController::class, 'index'])->middleware(['auth']);
Route::post('_admin/news', [App\Http\Controllers\Admin\NewsController::class, 'store'])->middleware(['auth']);
Route::get('_admin/news-item/{id}', [App\Http\Controllers\Admin\NewsController::class, 'newsItem'])->middleware(['auth']);
Route::put('_admin/news-item/{id}/update', [App\Http\Controllers\Admin\NewsController::class, 'update'])->middleware(['auth']);
Route::delete('_admin/news-item/{id}/delete', [App\Http\Controllers\Admin\NewsController::class, 'delete'])->middleware(['auth']);

// ADMIN NUMBERS
Route::get('_admin/numbers', [App\Http\Controllers\Admin\NumberController::class, 'index'])->middleware(['auth']);
Route::post('_admin/numbers', [App\Http\Controllers\Admin\NumberController::class, 'store'])->middleware(['auth']);
Route::post('_admin/numbers-import', [App\Http\Controllers\Admin\NumberController::class, 'import'])->middleware(['auth']);
Route::get('_admin/numbers-export/{plan}', [App\Http\Controllers\Admin\NumberController::class, 'export'])->middleware(['auth']);
Route::get('_admin/numbers-filter', [App\Http\Controllers\Admin\NumberController::class, 'filter'])->middleware(['auth']);
Route::get('_admin/number/{id}', [App\Http\Controllers\Admin\NumberController::class, 'number'])->middleware(['auth']);
Route::delete('_admin/numbers', [App\Http\Controllers\Admin\NumberController::class, 'delete'])->middleware(['auth']);

// ADMIN FILE UPLOAD
Route::post('_admin/file/upload', [App\Http\Controllers\Admin\FileController::class, 'store']);

// AUTH
require __DIR__.'/auth.php';