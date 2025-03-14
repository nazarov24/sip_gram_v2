<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverProfileCausesTable extends Migration
{
    public function up()
    {
        Schema::create('driver_profile_causes', function (Blueprint $table) {
            $table->id(); 
            $table->string('name', 255); 
            $table->unsignedBigInteger('status_id')->nullable(); 
            $table->unsignedBigInteger('created_user_id')->nullable(); 
            $table->boolean('is_active')->default(true); 
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('driver_profile_causes');
    }
}
