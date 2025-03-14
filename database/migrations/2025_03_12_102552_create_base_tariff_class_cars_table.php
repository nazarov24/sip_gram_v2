<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseTariffClassCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_tariff_class_cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('age_up_to');
            $table->unsignedBigInteger('base_tariff_id');
            $table->integer('carrying_capacity');
            $table->unsignedBigInteger('class_car_id');
            $table->unsignedBigInteger('condition_id');
            $table->timestamp('created_at')->nullable();
            $table->string('created_by')->nullable();
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->integer('height');
            $table->integer('length');
            $table->tinyInteger('main_class');
            $table->tinyInteger('min_count_seat');
            $table->enum('setting_intercity', ['on','off','car_setting']); 
            $table->timestamp('updated_at')->nullable();
            $table->integer('width');

          

            // Foreign key constraints
            $table->foreign('base_tariff_id')->references('id')->on('base_tariffs')->onDelete('cascade');
            $table->foreign('class_car_id')->references('id')->on('class_cars')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('base_tariff_class_cars');
    }
}
