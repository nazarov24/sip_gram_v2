<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestPerformerToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_performer_to_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('performer_id');
            $table->unsignedBigInteger('order_id');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->string('type_canceling_order', 500)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_performer_to_orders');
    }
}