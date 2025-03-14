<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformerLocationsTable extends Migration
{
    public function up()
    {
        Schema::create('performer_locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('performer_id');
            $table->decimal('longitude', 20, 16);
            $table->decimal('latitude', 20, 16);
            $table->timestamps();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('village_id')->nullable();
            $table->unsignedBigInteger('last_village_id')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('performer_locations');
    }
}
