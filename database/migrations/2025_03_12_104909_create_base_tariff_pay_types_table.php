<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseTariffPayTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_tariff_pay_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('base_tariff_id');
            $table->unsignedBigInteger('pay_type_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            // Foreign key constraints
            $table->foreign('base_tariff_id')->references('id')->on('base_tariffs')->onDelete('cascade');
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
        Schema::dropIfExists('base_tariff_pay_types');
    }
}
