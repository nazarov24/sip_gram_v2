<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceTariffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_tariffs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tariff_id');
            $table->double('delivery_price');
            $table->double('price_km_intercity');
            $table->double('price_km_city');
            $table->double('min_price');
            $table->double('price_hour');
            $table->double('min_penalty');
            $table->double('price_advertising');
            $table->double('price_by_performers')->default(0);
            $table->double('free_waiting_of_client_in_minute')->nullable();
            $table->timestamps();
            $table->double('filing_price')->nullable();
            $table->double('check_in_price')->nullable();
            $table->tinyInteger('is_active')->default(1);

            // Foreign key constraint
            $table->foreign('tariff_id')->references('id')->on('tariffs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_tariffs');
    }
}