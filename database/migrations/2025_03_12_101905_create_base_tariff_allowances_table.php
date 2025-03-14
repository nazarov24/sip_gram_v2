<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseTariffAllowancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_tariff_allowances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('allowance_id');
            $table->unsignedBigInteger('base_tariff_id');
            $table->timestamp('created_at')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->double('price');
            $table->integer('sort')->default(999);
            $table->timestamp('updated_at')->nullable();
            // Foreign key constraints
            $table->foreign('allowance_id')->references('id')->on('allowances')->onDelete('cascade');
            $table->foreign('base_tariff_id')->references('id')->on('base_tariffs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('base_tariff_allowances');
    }
}
