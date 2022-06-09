<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_ru');
            $table->string('name_uz');
            $table->string('name_tj');
            $table->string('icon')->nullable();
            $table->string('text')->nullable();
            $table->string('min')->nullable();
            $table->string('gb')->nullable();
            $table->string('sms')->nullable();
            $table->string('days')->nullable();
            $table->integer('in_stock')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('plans');
    }
};
