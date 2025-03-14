<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashingOutsTable extends Migration
{
    public function up()
    {
        Schema::create('cashing_outs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('performer_id');
            $table->double('summa');
            $table->string('result_message', 255);
            $table->integer('bank_id')->nullable();
            $table->unsignedBigInteger('osmp_txn_id');
            $table->unsignedBigInteger('pv_y_txn');
            $table->enum('status', ['0', '1'])->default('1');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('performer_id')->references('id')->on('performers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cashing_outs');
    }
}
