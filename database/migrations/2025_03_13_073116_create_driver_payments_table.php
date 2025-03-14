<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverPaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('driver_payments', function (Blueprint $table) {
            $table->id();
            $table->double('amount');
            $table->unsignedBigInteger('performer_id');
            $table->unsignedBigInteger('provider_tran_id');
            $table->bigInteger('transaction_id');
            $table->unsignedBigInteger('payment_type_id');
            $table->timestamps();
            $table->enum('status', ['NOT_PROCESSED', 'PROCESSING', 'PROCESSED'])->default('NOT_PROCESSED');
            $table->double('sum_for')->nullable();
            $table->double('sum_after')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();

            // Foreign key constraints
            $table->foreign('performer_id')->references('id')->on('performers')->onDelete('cascade');
            $table->foreign('payment_type_id')->references('id')->on('payment_types')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('driver_payments');
    }
}
