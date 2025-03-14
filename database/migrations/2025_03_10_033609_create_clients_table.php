<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone', 255);
            $table->string('first_name', 255)->nullable();
            $table->string('last_name', 255)->nullable();
            $table->string('patronymic', 255)->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->timestamp('birth_date')->nullable();
            $table->string('email', 255)->nullable();
            $table->string('password', 255)->nullable();
            $table->string('login', 255)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('fcm_token')->nullable();
            $table->tinyInteger('is_online')->default(0);
            $table->string('socket_id', 100)->nullable();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->string('id_num_passport', 255)->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->text('dop_info')->nullable();
            $table->string('avatar', 255)->nullable();
            $table->unsignedBigInteger('app_id')->nullable();

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
        Schema::dropIfExists('clients');
    }
}
