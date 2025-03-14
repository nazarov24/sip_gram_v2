<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingAutoAssignPhotoControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_auto_assign_photo_controls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('events', ['new_auto', 'new_performer', 'new_year', 'new...']);
            $table->integer('day_for_check');
            $table->unsignedBigInteger('type_photo_control_id');
            $table->unsignedBigInteger('created_by');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('type_photo_control_id')->references('id')->on('type_photo_controls')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting_auto_assign_photo_controls');
    }
}
