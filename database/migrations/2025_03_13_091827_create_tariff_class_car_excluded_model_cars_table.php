<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTariffClassCarExcludedModelCarsTable extends Migration
{
    public function up()
    {
        Schema::create('tariff_class_car_excluded_model_cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tariff_class_car_id');
            $table->unsignedBigInteger('model_car_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tariff_class_car_excluded_model_cars');
    }
}
