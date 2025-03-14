<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverChargesTable extends Migration
{
    public function up()
    {
        Schema::create('driver_charges', function (Blueprint $table) {
            $table->id();
            $table->double('amount');
            $table->string('transaction_id', 255);
            $table->unsignedBigInteger('performer_id');
            $table->unsignedBigInteger('change_type_id');
            $table->timestamps();
            $table->enum('status', ['NOT_PROCESSED', 'PROCESSING', 'PROCESSED'])->default('NOT_PROCESSED');
            $table->double('sum_for')->nullable();
            $table->double('sum_after')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();

            
            $table->foreign('performer_id')->references('id')->on('performers')->onDelete('cascade');
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('driver_charges');
    }
}
