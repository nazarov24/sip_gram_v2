<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformerAssignPhotoControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performer_assign_photo_controls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model_type', 255);
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('performer_id');
            $table->unsignedBigInteger('type_photo_control_id');
            $table->unsignedBigInteger('performer_p_c_status_id');
            $table->timestamp('start_date')->useCurrent();
            $table->timestamp('end_date')->useCurrent();
            $table->unsignedInteger('created_by')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('performer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('type_photo_control_id')->references('id')->on('type_photo_controls')->onDelete('cascade');
          

            // Indexes
            $table->index(['model_id', 'model_type'], 'lead_message_s_model_id_model_type_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performer_assign_photo_controls');
    }
}