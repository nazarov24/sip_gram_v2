<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformerOptionsTable extends Migration
{
    public function up()
    {
        Schema::create('performer_options', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->boolean('is_active')->default(true);
            $table->string('slag', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('performer_options');
    }
}
