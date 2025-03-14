<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverTopUpFromDriversTable extends Migration
{
    public function up()
    {
        Schema::create('driver_top_up_from_drivers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('performer_setter_id');
            $table->unsignedBigInteger('performer_getter_id');
            $table->double('summa');
            $table->enum('status', ['0', '1'])->default('1');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('driver_top_up_from_drivers');
    }
}
