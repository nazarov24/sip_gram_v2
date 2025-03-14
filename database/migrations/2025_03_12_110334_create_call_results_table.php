<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('cdr_id');
            $table->unsignedBigInteger('performer_id')->nullable();
            $table->unsignedBigInteger('driver_profile_id')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('memo_id')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('set null');
            $table->foreign('performer_id')->references('id')->on('performers')->onDelete('set null');
            $table->foreign('driver_profile_id')->references('id')->on('driver_profiles')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('call_results');
    }
}
