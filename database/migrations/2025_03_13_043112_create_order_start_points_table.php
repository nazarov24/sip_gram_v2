<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderStartPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_start_points', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->string('address_type', 255)->nullable();
            $table->decimal('lng', 20, 16)->default(0.0000000000000000);
            $table->decimal('lat', 20, 16)->default(0.0000000000000000);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            // Indexes
            $table->index('address_type', 'address_type_find');
            $table->index('lng', 'lng_find');
            $table->index('lat', 'lat_find');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_start_points');
    }
}
