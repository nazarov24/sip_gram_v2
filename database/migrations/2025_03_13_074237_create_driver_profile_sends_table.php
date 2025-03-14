<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverProfileSendsTable extends Migration
{
    public function up()
    {
        Schema::create('driver_profile_sends', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('driver_profile_id'); 
            $table->unsignedBigInteger('driver_profile_status_id'); 
            $table->boolean('is_send')->default(false); 
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('driver_profile_sends');
    }
}
