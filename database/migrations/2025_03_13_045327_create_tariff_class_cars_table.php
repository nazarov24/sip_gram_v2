<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTariffClassCarsTable extends Migration
{
    public function up()
    {
        Schema::create('tariff_class_cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tariff_id');
            $table->unsignedBigInteger('class_car_id');
            $table->unsignedBigInteger('condition_id');
            $table->timestamps();
            $table->boolean('main_class')->default(false);
            $table->enum('setting_intercity', ['on', 'off', 'car_setting'])->default('on');
            $table->tinyInteger('min_count_seat')->default(0);
            $table->tinyInteger('age_up_to')->default(0);
            $table->integer('width')->default(0);
            $table->integer('height')->default(0);
            $table->integer('length')->default(0);
            $table->integer('carrying_capacity')->default(0);
            $table->string('created_by', 255)->nullable();
            $table->unsignedBigInteger('created_by_id')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tariff_class_cars');
    }
}
