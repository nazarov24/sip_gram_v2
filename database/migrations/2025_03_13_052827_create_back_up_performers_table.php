<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('back_up_performers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',length: 255);
            $table->string('last_name',length:255);
            $table->string('patronymic',length:255);
            $table->string('gender',length:255);
            $table->date('date_of_birth');
            $table->string('email',length:255);
            $table->string('promo_code',length:255);
            $table->string('serials_number',length:255);
            $table->date('expirated_driver_license');
            $table->char('serial_number_passport',length:9);
            $table->date('expirated_passport');
            $table->string('car_number',length:255);
            $table->string('phone',length:255);
            $table->string('body_type',length:255);
            $table->integer('city_id');
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('at_work')->default(0);
            $table->integer('type_earning_id');
            $table->year('year_of_issue');
            $table->string('phone_without_code',length:255);
            $table->integer('step');
            $table->string('contact_number',length:255);
            $table->json('transports');
            $table->integer('otp');
            $table->dateTime('expaired_at');
            $table->bigInteger('division_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('back_up_performers');
    }
};
