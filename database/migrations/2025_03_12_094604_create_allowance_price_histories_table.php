<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllowancePriceHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allowance_price_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('allowance_history_id')->nullable();
            $table->unsignedBigInteger('allowance_id');
            $table->unsignedBigInteger('allowance_price_id')->nullable();
            $table->integer('count');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->double('price');
            $table->enum('type', ['FIX', 'PERCENT']); 
            $table->timestamp('updated_at')->nullable();

            // Foreign key constraints
            $table->foreign('allowance_history_id')->references('id')->on('allowance_histories')->onDelete('set null');
            $table->foreign('allowance_id')->references('id')->on('allowances')->onDelete('cascade');
            $table->foreign('allowance_price_id')->references('id')->on('allowance_prices')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allowance_price_histories');
    }
}
