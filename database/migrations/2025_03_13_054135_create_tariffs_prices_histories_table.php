<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTariffsPricesHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariffs_prices_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tariffs_history_id');
            $table->unsignedBigInteger('tariffs_price_id');
            $table->string('step', 255);
            $table->unsignedBigInteger('model_id');
            $table->string('model', 255);
            $table->double('delivery_price')->default(0);
            $table->double('price_km_intercity')->default(0);
            $table->double('price_km_city')->default(0);
            $table->double('min_price')->default(0);
            $table->double('price_hour')->default(0);
            $table->double('min_penalty')->default(0);
            $table->double('price_advertising')->default(0);
            $table->double('free_waiting_of_client_in_minute')->default(0);
            $table->double('filing_price')->default(0);
            $table->double('check_in_price')->default(0);
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('tariffs_history_id')->references('id')->on('tariffs_histories')->onDelete('cascade');
            $table->foreign('tariffs_price_id')->references('id')->on('price_tariffs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tariffs_prices_histories');
    }
}
