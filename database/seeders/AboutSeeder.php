<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AboutSeeder extends Seeder
{
    public function run()
    {
        DB::table('abouts')->insert([
            [
                "id" => 1,
                "ru" => "<p>Текст о компании на русском языке.</p>",
                "uz" => "<p>Текст о компании на узбекском языке.</p>",
                "tj" => "<p>Текст о компании на таджикском языке.</p>",
            ],
        ]);
    }
}