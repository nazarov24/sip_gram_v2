<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('performer_transport_option_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('performer_transport_id')->nullable();
            $table->unsignedBigInteger('option_id')->nullable();
            $table->tinyInteger('is_check');
            $table->unsignedBigInteger('performer_transport_history_id')->nullable();
            $table->unsignedBigInteger('performer_transport_option_id')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('performer_transport_option_histories');
    }
};

