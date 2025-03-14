<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseTariffPayTypeHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_tariff_pay_type_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('step');
            $table->unsignedBigInteger('model_id');
            $table->string('model');
            $table->unsignedBigInteger('base_tariff_pay_type_id');
            $table->unsignedBigInteger('base_tariff_history_id');
            $table->unsignedBigInteger('pay_type_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            // Foreign key constraints
            $table->foreign('base_tariff_pay_type_id')->references('id')->on('base_tariff_pay_types')->onDelete('cascade');
            $table->foreign('base_tariff_history_id')->references('id')->on('base_tariff_histories')->onDelete('cascade');
            $table->foreign('pay_type_id')->references('id')->on('performer_card_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('base_tariff_pay_type_histories');
    }
}
