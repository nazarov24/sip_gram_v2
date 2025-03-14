<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformerTransportsHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('performer_transports_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('performer_transports_id')->nullable();
            $table->unsignedBigInteger('performer_id')->nullable();
            $table->unsignedBigInteger('category_car_id')->nullable();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->unsignedBigInteger('parent_history_id')->nullable();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->string('model', 255)->nullable();
            $table->unsignedBigInteger('car_model_id')->nullable();
            $table->unsignedBigInteger('color_id')->nullable();
            $table->unsignedBigInteger('condition_id')->nullable();
            $table->unsignedBigInteger('body_type_id')->nullable();
            $table->year('year_of_issue')->nullable();
            $table->tinyInteger('count_seat')->nullable();
            $table->integer('license_number')->nullable();
            $table->unsignedBigInteger('connected_id')->nullable();
            $table->string('car_number', 255)->nullable();
            $table->string('carrying_capacity', 255)->nullable();
            $table->boolean('conditioner')->default(false);
            $table->boolean('active')->default(false);
            $table->boolean('is_publish')->default(true);
            $table->string('legal_entity', 255)->nullable();
            $table->text('dop_info')->nullable();
            $table->string('step', 40)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('performer_transports_histories');
    }
}
