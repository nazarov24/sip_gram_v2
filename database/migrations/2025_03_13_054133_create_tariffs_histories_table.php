<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTariffsHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariffs_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent_history_id')->nullable();
            $table->unsignedBigInteger('tariff_id');
            $table->string('step', 255);
            $table->unsignedBigInteger('model_id');
            $table->string('model', 255);
            $table->string('name', 255);
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('type_tariff_id');
            $table->integer('sort')->default(999);
            $table->tinyInteger('is_active')->default(1);
            $table->text('description')->nullable();
            $table->timestamps();
            $table->tinyInteger('auto_assignment')->default(1);
            $table->double('price_by_performers')->default(0);
            $table->integer('seats')->nullable();

            // Foreign key constraints
            $table->foreign('tariff_id')->references('id')->on('tariffs')->onDelete('cascade');
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->foreign('type_tariff_id')->references('id')->on('type_tariffs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tariffs_histories');
    }
}
