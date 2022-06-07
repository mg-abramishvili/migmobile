<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PlanSeeder extends Seeder
{
    public function run()
    {
        DB::table('plans')->insert([
            [
                "id" => 1,
                "name_ru" => "Тариф от Билайн",
                "name_uz" => "Билайн-дан тариф",
                "name_tj" => "Тарофа аз Билайн",
                "icon" => "/img/beeline.svg",
                "min" => "100",
                "gb" => "10",
                "days" => "30"
            ],
            [
                "id" => 2,
                "name_ru" => "Тариф от МТС",
                "name_uz" => "МТС-дан тариф",
                "name_tj" => "Тарофа аз МТС",
                "icon" => "/img/mts.svg",
                "min" => "100",
                "gb" => "10",
                "days" => "30"
            ],
            [
                "id" => 3,
                "name_ru" => "Тариф от Мегафон",
                "name_uz" => "Мегафон-дан тариф",
                "name_tj" => "Тарофа аз Мегафон",
                "icon" => "/img/megafon.svg",
                "min" => "100",
                "gb" => "10",
                "days" => "30"
            ],
            [
                "id" => 4,
                "name_ru" => "Тариф от Теле2",
                "name_uz" => "Теле2-дан тариф",
                "name_tj" => "Тарофа аз Теле2",
                "icon" => "/img/tele2.svg",
                "min" => "100",
                "gb" => "10",
                "days" => "30"
            ],
        ]);
    }
}