<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run()
    {
        DB::table('news')->insert([
            ["id" => "1", "name" => "Новость 1", "lang" => "ru", "text" => "Текст", "gallery" => ""],
            ["id" => "2", "name" => "Новость 2", "lang" => "ru", "text" => "Текст", "gallery" => ""],
            ["id" => "3", "name" => "Новость 3", "lang" => "ru", "text" => "Текст", "gallery" => ""],
            ["id" => "4", "name" => "Новость 4", "lang" => "ru", "text" => "Текст", "gallery" => ""],
            ["id" => "5", "name" => "Novost Uz 1", "lang" => "uz", "text" => "Текст", "gallery" => ""],
            ["id" => "6", "name" => "Novost Uz 2", "lang" => "uz", "text" => "Текст", "gallery" => ""],
            ["id" => "7", "name" => "Novost Uz 3", "lang" => "uz", "text" => "Текст", "gallery" => ""],
            ["id" => "8", "name" => "Novost Uz 4", "lang" => "uz", "text" => "Текст", "gallery" => ""],
            ["id" => "9", "name" => "Novost Tj 1", "lang" => "tj", "text" => "Текст", "gallery" => ""],
            ["id" => "10", "name" => "Novost Tj 2", "lang" => "tj", "text" => "Текст", "gallery" => ""],
            ["id" => "11", "name" => "Novost Tj 3", "lang" => "tj", "text" => "Текст", "gallery" => ""],
            ["id" => "12", "name" => "Novost Tj 4", "lang" => "tj", "text" => "Текст", "gallery" => ""],
        ]);
    }
}