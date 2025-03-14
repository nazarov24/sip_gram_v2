<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelCarsTable extends Migration
{
    public function up()
    {
        Schema::create('model_cars', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->unsignedBigInteger('category_car_id');
            $table->unsignedBigInteger('class_car_id')->nullable();
            $table->tinyInteger('car_seat_from')->nullable();
            $table->tinyInteger('car_seat_before')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('car_brand_id')->nullable();
            $table->string('car_model', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('model_cars');
    }
}
