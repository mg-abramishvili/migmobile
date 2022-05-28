<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('numbers', function (Blueprint $table) {
            $table->string('serial_number')->nullable();
        });
    }

    public function down()
    {
        Schema::table('numbers', function (Blueprint $table) {
            //
        });
    }
};
