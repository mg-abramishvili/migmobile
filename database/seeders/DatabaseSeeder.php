<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            NewsSeeder::class,
            AboutSeeder::class,
            LoanSeeder::class,
            BankCardSeeder::class,
            PlanSeeder::class,
        ]);
    }
}