<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarOptionsTable extends Migration
{
    public function up()
    {
        Schema::create('car_options', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->unsignedBigInteger('category_car_id')->nullable();
            $table->unsignedBigInteger('allowance_id')->nullable();
            $table->tinyInteger('is_active')->default(0);
            $table->timestamps();
            $table->string('model', 255)->nullable();

            // Foreign key constraints
            $table->foreign('category_car_id')->references('id')->on('category_cars')->onDelete('set null');
            $table->foreign('allowance_id')->references('id')->on('allowances')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('car_options');
    }
}
