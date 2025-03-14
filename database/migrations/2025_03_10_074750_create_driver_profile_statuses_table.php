<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverProfileStatusesTable extends Migration
{
    public function up()
    {
        Schema::create('driver_profile_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->unsignedBigInteger('created_user_id')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('driver_profile_statuses');
    }
}
