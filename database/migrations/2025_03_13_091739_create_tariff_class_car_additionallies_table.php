<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTariffClassCarAdditionalliesTable extends Migration
{
    public function up()
    {
        Schema::create('tariff_class_car_additionallies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tariff_class_car_id');
            $table->unsignedBigInteger('performer_car_option_id');
            $table->unsignedBigInteger('model_id');
            $table->string('model', 255);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tariff_class_car_additionallies');
    }
}
