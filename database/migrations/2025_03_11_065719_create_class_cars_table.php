<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassCarsTable extends Migration
{
    public function up()
    {
        Schema::create('class_cars', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->unsignedBigInteger('category_car_id');
            $table->timestamps();
            $table->tinyInteger('is_active')->default(1);

            // Foreign key constraint
            $table->foreign('category_car_id')->references('id')->on('category_cars')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('class_cars');
    }
}
