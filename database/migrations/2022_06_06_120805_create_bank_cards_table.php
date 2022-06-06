<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bank_cards', function (Blueprint $table) {
            $table->id();
            $table->text('ru');
            $table->text('uz');
            $table->text('tj');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bank_cards');
    }
};
