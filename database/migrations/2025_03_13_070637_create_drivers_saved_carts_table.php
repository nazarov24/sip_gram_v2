<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversSavedCartsTable extends Migration
{
    public function up()
    {
        Schema::create('drivers_saved_carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('performer_id');
            $table->string('pan', 16)->nullable();
            $table->string('type', 255)->nullable();
            $table->string('brand', 100);
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('order_id');
            $table->enum('status', ['0', '1'])->default('1');
            $table->timestamps();
            $table->unsignedBigInteger('type_id')->default(1);

            // Foreign key constraints
            $table->foreign('performer_id')->references('id')->on('performers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('drivers_saved_carts');
    }
}