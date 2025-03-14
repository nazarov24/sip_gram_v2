<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTariffHasClientPayTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariff_has_client_pay_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tariff_id');
            $table->unsignedBigInteger('pay_type_id');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('tariff_id')->references('id')->on('tariffs')->onDelete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tariff_has_client_pay_types');
    }
}
