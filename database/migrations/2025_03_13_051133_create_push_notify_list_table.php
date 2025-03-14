<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePushNotifyListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('push_notify_list', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('token', 255);
            $table->string('title', 255);
            $table->string('body', 255);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->json('data')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

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
        Schema::dropIfExists('push_notify_list');
    }
}
