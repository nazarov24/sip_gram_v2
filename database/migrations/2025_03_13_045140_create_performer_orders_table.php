<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformerOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performer_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('performer_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedInteger('status_id');
            $table->timestamps();
            $table->integer('add_rating')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('filing_time')->nullable();
            $table->string('rating_reason', 255)->nullable();
            $table->timestamp('end_time')->nullable();
            $table->timestamp('start_filing_time')->nullable();

            
            $table->foreign('performer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performer_orders');
    }
}
