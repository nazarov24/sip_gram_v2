<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckShiftsTable extends Migration
{
    public function up()
    {
        Schema::create('check_shifts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('performer_id');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('performer_id')->references('id')->on('performers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('check_shifts');
    }
}
