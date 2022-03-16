<?php

use Illuminate\Support\Facades\Route;
use App\Models\News;

Route::get('/{lang?}', function () {
    if(request()->lang) {
        $news = News::where('lang', request()->lang)->get();
    } else {
        $news = News::where('lang', 'ru')->get();
    }

    return view('home', compact('news'));
})->name('home');