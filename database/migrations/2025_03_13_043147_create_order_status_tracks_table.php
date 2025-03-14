<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateOrderStatusTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_status_tracks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('performer_id');
            // $table->point('performer_point');
            $table->unsignedBigInteger('order_history_id');
            $table->string('performer_status', 255);
            $table->unsignedBigInteger('order_status_id');
            // $table->point('order_start_point')->nullable();
            // $table->point('order_end_point')->nullable();
            // $table->linestring('route_start')->nullable();
            // $table->linestring('route_end')->nullable();
            $table->double('distance');
            $table->double('distance_end');
            $table->double('line_distance');
            $table->double('line_distance_end')->nullable();
            $table->double('distance_order_end_points')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('performer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('order_history_id')->references('id')->on('order_histories')->onDelete('cascade');
            $table->foreign('order_status_id')->references('id')->on('order_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_status_tracks');
    }
}
