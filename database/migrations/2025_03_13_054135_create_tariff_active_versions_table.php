<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTariffActiveVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariff_active_versions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tariff_id');
            $table->unsignedBigInteger('user_id');
            $table->text('comment');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('tariff_id')->references('id')->on('tariffs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tariff_active_versions');
    }
}
