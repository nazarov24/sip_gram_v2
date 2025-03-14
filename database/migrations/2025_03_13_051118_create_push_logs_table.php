<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePushLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('push_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('to', 255);
            $table->string('title', 255);
            $table->string('body', 255);
            $table->json('data')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->tinyInteger('is_sent')->default(0);
            $table->json('result')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('push_logs');
    }
}
