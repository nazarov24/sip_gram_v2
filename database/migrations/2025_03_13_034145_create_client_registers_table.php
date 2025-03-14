<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_registers', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('phone_number', 255);
            $table->string('sms_code', 255);
            $table->tinyInteger('step_1')->default(1);
            $table->tinyInteger('step_2')->default(0);
            $table->tinyInteger('step_3')->default(0);
            $table->integer('count')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_registers');
    }
}
