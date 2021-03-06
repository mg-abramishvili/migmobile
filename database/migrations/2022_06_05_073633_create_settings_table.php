<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('yookassa_shop_id')->nullable();
            $table->string('yookassa_secret_key')->nullable();
            $table->integer('free_delivery_from')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('vkontakte')->nullable();
            $table->string('telegram')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('youtube')->nullable();
            $table->string('odnoklassniki')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
