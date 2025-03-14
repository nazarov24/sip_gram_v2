<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('driver_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('driver_profile_type_id')->nullable();
            $table->unsignedBigInteger('driver_profile_status_id')->nullable();
            $table->string('first_name', 255)->nullable();
            $table->string('last_name', 255)->nullable();
            $table->string('patronymic', 255)->nullable();
            $table->string('phone', 255);
            $table->text('dog_info')->nullable();
            $table->time('from_time')->nullable();
            $table->time('before_time')->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('information_sources_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('cause_id')->nullable();
            $table->string('portfolio_link', 255)->nullable();
            $table->string('summary', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('promo_code', 255)->nullable();
            $table->unsignedBigInteger('type_coming_id')->nullable();
            $table->string('serials_number', 255)->nullable();
            $table->date('expinated_driver_license')->nullable();
            $table->string('serial_number_passport', 255)->nullable();
            $table->date('expinated_passport')->nullable();
            $table->unsignedBigInteger('driver_license_type_id')->nullable();
            $table->string('dop_phone', 255)->nullable();
            $table->unsignedBigInteger('passport_officer_id')->nullable();
            $table->string('address', 255)->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->timestamp('reminder_date_at')->nullable();
            $table->bigInteger('reminder_user_id')->nullable();
            $table->unsignedBigInteger('back_up_performer_id')->nullable();

            // Foreign key constraints
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->foreign('driver_profile_status_id')->references('id')->on('driver_profile_statuses')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('back_up_performer_id')->references('id')->on('performers')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('driver_profiles');
    }
}
