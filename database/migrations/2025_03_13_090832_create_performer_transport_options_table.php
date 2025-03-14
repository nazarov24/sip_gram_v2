<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('performer_transport_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('performer_transport_id')->nullable();
            $table->unsignedBigInteger('option_id')->nullable();
            $table->timestamps();
            $table->tinyInteger('is_check')->default(0);
            $table->timestamp('deleted_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('performer_transport_options');
    }
};

