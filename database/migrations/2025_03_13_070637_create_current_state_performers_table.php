<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentStatePerformersTable extends Migration
{
    public function up()
    {
        Schema::create('current_state_performers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('performer_id');
            $table->unsignedBigInteger('state_status_id');
            $table->string('status', 255)->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('performer_id')->references('id')->on('performers')->onDelete('cascade');
            $table->foreign('state_status_id')->references('id')->on('state_statuses')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('current_state_performers');
    }
}
