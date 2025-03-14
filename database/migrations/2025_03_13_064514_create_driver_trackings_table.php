<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverTrackingsTable extends Migration
{
    public function up()
    {
        Schema::create('driver_trackings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('performer_id');
            $table->decimal('leg', 20, 16);
            $table->decimal('lat', 20, 16);
            $table->timestamps();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('order_status_id')->nullable();
            $table->string('direction', 255)->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('village_id')->nullable();
            $table->unsignedBigInteger('last_village_id')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('driver_trackings');
    }
}
