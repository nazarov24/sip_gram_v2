<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeTariffAllowancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_tariff_allowances', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('type_tariff_id');
            $table->unsignedBigInteger('allowance_id');
            $table->integer('sort')->default(999);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->tinyInteger('is_active')->default(1);

           
            $table->foreign('type_tariff_id')->references('id')->on('type_tariffs')->onDelete('cascade');
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
        Schema::dropIfExists('type_tariff_allowances');
    }
}
