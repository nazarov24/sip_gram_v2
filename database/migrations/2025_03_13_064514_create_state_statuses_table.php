<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('state_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->string('alias', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('state_statuses');
    }
};

