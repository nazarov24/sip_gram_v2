<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformerPhotoControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performer_photo_controls', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('check_user_id')->nullable();
            $table->unsignedBigInteger('performer_id');
            $table->unsignedBigInteger('performer_assign_p_c_id');
            $table->timestamps();

        
            $table->foreign('check_user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('performer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('performer_assign_p_c_id')->references('id')->on('performer_assign_photo_controls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performer_photo_controls');
    }
}
