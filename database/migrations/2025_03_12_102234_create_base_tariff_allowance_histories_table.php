<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseTariffAllowanceHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_tariff_allowance_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('allowance_id');
            $table->unsignedBigInteger('base_tariff_allowance_id');
            $table->unsignedBigInteger('base_tariff_history_id');
            $table->timestamp('created_at')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->string('model')->nullable();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->double('price');
            $table->integer('sort')->default(999);
            $table->enum('step', ['afterUpdate','forUpdate','afterCreate'])->nullable(); 
            $table->timestamp('updated_at')->nullable();

            // Foreign key constraints
            $table->foreign('allowance_id')->references('id')->on('allowances')->onDelete('cascade');
            $table->foreign('base_tariff_allowance_id')->references('id')->on('base_tariff_allowances')->onDelete('cascade');
            $table->foreign('base_tariff_history_id')->references('id')->on('base_tariff_histories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('base_tariff_allowance_histories');
    }
}
