<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('created_at')->nullable();
            $table->string('device');
            $table->string('deviceld')->index(); 
            $table->string('lp');
            $table->string('name');
            $table->string('os');
            $table->timestamp('updated_at')->nullable();
            $table->string('userAgent')->index(); 
            $table->string('version');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_details');
    }
}
