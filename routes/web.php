<?php

use Illuminate\Support\Facades\Route;
use App\Models\News;

Route::get('/', function () {
    $news = News::where('lang', 'ru')->get();

    return view('home', compact('news'));
})->name('homeRu');

Route::get('/uz', function () {
    $news = News::where('lang', 'uz')->get();
    
    return view('home', compact('news'));
})->name('homeUz');

Route::get('/tj', function () {
    $news = News::where('lang', 'tj')->get();
    
    return view('home', compact('news'));
})->name('homeTj');

Route::get('/avia', function() {
    return view('avia');
})->name('aviaRu');

Route::get('/uz/avia', function() {
    return view('avia');
})->name('aviaUz');

Route::get('/tj/avia', function() {
    return view('avia');
})->name('aviaTj');

// ADMIN
Route::get('admin', function () {
    return view('layouts.admin');
})->middleware(['auth']);

Route::prefix("admin")->middleware(['auth'])->group(function() {
    Route::get('{any}', function () {
        return view('layouts.admin');
    })->where('any', '.*');
});

// AUTH
require __DIR__.'/auth.php';