<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformerPasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performer_password_resets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('send_reset_by');
            $table->unsignedBigInteger('performer_id');
            $table->string('old_password', 150);
            $table->string('new_password', 150);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('send_reset_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('performer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performer_password_resets');
    }
}
