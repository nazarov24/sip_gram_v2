<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformersTable extends Migration
{
    public function up()
    {
        Schema::create('performers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('patronymic', 255)->nullable();
            $table->enum('gender', ['0', '1'])->default('0');
            $table->date('date_of_birth');
            $table->string('email', 255)->nullable();
            $table->string('promo_code', 255)->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedInteger('type_earning_id')->nullable();
            $table->string('serialis_number', 255)->nullable();
            $table->date('explained_chiver_locense')->nullable();
            $table->date('explained_passport')->nullable();
            $table->unsignedBigInteger('passport_office_id')->nullable();
            $table->string('address', 255)->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->double('rating')->default(0.98);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('type_novement_id')->nullable();
            $table->enum('status', ['0', '1'])->default('0');
            $table->string('phone', 255)->nullable();
            $table->string('phone_without_code', 255)->nullable();
            $table->string('login', 255)->nullable();
            $table->string('password', 255);
            $table->string('contact_number', 255)->nullable();
            $table->boolean('is_tree')->default(true);
            $table->timestamps();
            $table->string('icm_token', 255)->nullable();
            $table->date('date_passport')->nullable();
            $table->date('date_driver_license')->nullable();
            $table->char('serial_number_passport', 9)->nullable();
            $table->string('register_from', 255)->nullable();
            $table->text('dog_info')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamp('password_changed_at')->nullable();
            $table->boolean('is_sctive')->default(true);
            $table->boolean('is_on_shift')->default(true);
            $table->boolean('is_online')->default(false);
            $table->string('socket_id', 255)->nullable();
            $table->decimal('rating_by_client', 8, 7)->default(5.0000000);
            $table->timestamp('expired_zero_commission')->nullable();
            $table->double('commission_percent')->nullable();
            $table->softDeletes();
            $table->enum('photo_control_status', ['ACCEPTED', 'IN_PROCESS', 'NOT_ACCEPTED'])->default('NOT_ACCEPTED');
            $table->double('activity')->default(100);
        });
    }

    public function down()
    {
        Schema::dropIfExists('performers');
    }
}
