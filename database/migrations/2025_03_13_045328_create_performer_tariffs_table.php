<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformerTariffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performer_tariffs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('performer_id');
            $table->unsignedBigInteger('tariff_id');
            $table->timestamps();
            $table->unsignedBigInteger('tariff_class_car_id')->nullable();
            $table->tinyInteger('is_active')->default(1);

            // Foreign key constraints
            $table->foreign('performer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tariff_id')->references('id')->on('tariffs')->onDelete('cascade');
            $table->foreign('tariff_class_car_id')->references('id')->on('tariff_class_cars')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performer_tariffs');
    }
}