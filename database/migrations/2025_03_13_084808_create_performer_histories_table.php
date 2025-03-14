<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformerHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('performer_histories', function (Blueprint $table) {
            $table->id();
            $table->string('model', 255)->nullable();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->unsignedBigInteger('performer_id')->nullable();
            $table->unsignedBigInteger('parent_history_id')->nullable();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('patronymic', 255)->nullable();
            $table->tinyInteger('gender')->default(0);
            $table->date('date_of_birth');
            $table->string('email', 255)->nullable();
            $table->string('promo_code', 255)->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedInteger('type_earning_id')->nullable();
            $table->string('serials_number', 255)->nullable();
            $table->date('expirated_driver_license')->nullable();
            $table->date('expirated_passport')->nullable();
            $table->unsignedBigInteger('passport_office_id')->nullable();
            $table->string('fcm_token', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->double('rating')->default(0.98);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('type_movement_id')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('phone', 255)->nullable();
            $table->string('phone_without_code', 255)->nullable();
            $table->string('login', 255)->nullable();
            $table->string('contact_number', 255)->nullable();
            $table->boolean('is_tree')->default(true);
            $table->string('register_from', 255)->nullable();
            $table->string('step', 40)->nullable();
            $table->timestamps();
            $table->string('password', 255)->nullable();
            $table->char('serial_number_passport', 9)->nullable();
            $table->string('dop_info', 255)->nullable();
            $table->timestamp('expired_zero_commission')->nullable();
            $table->double('commission_percent')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('performer_histories');
    }
}