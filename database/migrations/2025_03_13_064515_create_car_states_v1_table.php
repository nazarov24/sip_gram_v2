<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('car_state_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_state_id');
            $table->unsignedBigInteger('state_status_id');
            $table->unsignedBigInteger('driver_tracking_id');
            $table->timestamps();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->string('model', 255)->nullable();
            $table->string('performer_balance', 255)->nullable();

            // Foreign key constraints
            // $table->foreign('car_state_id')->references('id')->on('car_states')->onDelete('cascade');
            $table->foreign('state_status_id')->references('id')->on('state_statuses')->onDelete('cascade');
            $table->foreign('driver_tracking_id')->references('id')->on('driver_trackings')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('car_state_statuses');
    }
};

