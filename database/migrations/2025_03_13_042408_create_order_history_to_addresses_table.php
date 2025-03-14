<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderHistoryToAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_history_to_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_history_id');
            $table->unsignedBigInteger('order_to_address_id');
            $table->unsignedBigInteger('search_address_id')->nullable();
            $table->string('model', 255)->nullable();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->timestamps();
            $table->string('step', 255)->nullable();

            // Foreign key constraints
            $table->foreign('order_history_id')->references('id')->on('order_histories')->onDelete('cascade');
            $table->foreign('order_to_address_id')->references('id')->on('order_to_addresses')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_history_to_addresses');
    }
}
