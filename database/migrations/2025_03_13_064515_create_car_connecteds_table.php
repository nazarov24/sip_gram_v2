<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarConnectedsTable extends Migration
{
    public function up()
    {
        Schema::create('car_connecteds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('performer_id');
            $table->unsignedBigInteger('performer_transport_id');
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('performer_id')->references('id')->on('performers')->onDelete('cascade');
            $table->foreign('performer_transport_id')->references('id')->on('performer_transports')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('car_connecteds');
    }
}
