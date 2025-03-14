<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTariffsAllowancesHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariffs_allowances_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tariffs_history_id');
            $table->unsignedBigInteger('tariffs_allowance_id');
            $table->string('step', 255);
            $table->unsignedBigInteger('model_id');
            $table->string('model', 255);
            $table->unsignedBigInteger('allowance_id');
            $table->integer('sort')->default(999);
            $table->double('price')->default(0);
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('tariffs_history_id')->references('id')->on('tariffs_histories')->onDelete('cascade');
            $table->foreign('tariffs_allowance_id')->references('id')->on('tariff_allowances')->onDelete('cascade');
            $table->foreign('allowance_id')->references('id')->on('allowances')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tariffs_allowances_histories');
    }
}
