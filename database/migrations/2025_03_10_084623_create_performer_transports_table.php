<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformerTransportsTable extends Migration
{
    public function up()
    {
        Schema::create('performer_transports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('performer_id')->nullable();
            $table->unsignedBigInteger('color_id')->nullable();
            $table->unsignedBigInteger('condition_id')->nullable();
            $table->year('year_of_issue')->nullable();
            $table->integer('license_number')->nullable();
            $table->unsignedBigInteger('connected_id')->nullable();
            $table->string('car_number', 255)->nullable();
            $table->boolean('active')->default(false);
            $table->string('legal_entity', 255)->nullable();
            $table->text('dop_info')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('car_model_id')->nullable();
            $table->unsignedBigInteger('body_type_id')->nullable();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->date('date_in_office')->nullable();
            $table->string('VIN', 255)->nullable();
            $table->string('STS_N', 255)->nullable();
            $table->text('cargo_properties')->nullable();
            $table->unsignedBigInteger('created_user_id')->nullable();
            $table->unsignedBigInteger('updated_user_id')->nullable();
            $table->tinyInteger('count_seat');
            $table->integer('small_number')->nullable();
            $table->unsignedBigInteger('licensor_id')->nullable();
            $table->softDeletes();
            $table->unsignedBigInteger('fuel_type_id')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('performer_transports');
    }
}
