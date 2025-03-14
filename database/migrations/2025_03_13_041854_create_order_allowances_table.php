<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderAllowancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_allowances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('allowance_id')->nullable();
            $table->timestamps();
            $table->double('price')->nullable();
            $table->tinyInteger('is_active')->default(1);

            // Foreign key constraints
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('set null');
            $table->foreign('allowance_id')->references('id')->on('allowances')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_allowances');
    }
}
