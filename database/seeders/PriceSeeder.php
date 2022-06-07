<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PriceSeeder extends Seeder
{
    public function run()
    {
        DB::table('prices')->insert([
            [
                "id" => 1,
                "name" => "Цена за 1-4 шт",
                "type" => "simple",
                "quantity_condition" => "quantity < 5",
                "price" => 300,
            ],
            [
                "id" => 2,
                "name" => "Цена за 5-9 номеров",
                "type" => "simple",
                "quantity_condition" => "quantity >= 5 && quantity <= 9",
                "price" => 250,
            ],
            [
                "id" => 3,
                "name" => "Цена за 10 и более",
                "type" => "simple",
                "quantity_condition" => "quantity >= 10",
                "price" => 100,
            ],
            [
                "id" => 4,
                "name" => "Цена за 1-2 шт",
                "type" => "pretty",
                "quantity_condition" => "quantity < 3",
                "price" => 790,
            ],
            [
                "id" => 5,
                "name" => "Цена за 3 шт и более",
                "type" => "pretty",
                "quantity_condition" => "quantity >= 3",
                "price" => 500,
            ],
        ]);
    }
}