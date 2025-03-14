<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientPayTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_pay_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('model_id');
            $table->string('model_type', 255);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('icon', 255)->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('card_type_id')->nullable();
            $table->string('device_id', 255)->nullable();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->index(['model_id', 'model_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_pay_types');
    }
}
