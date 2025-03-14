<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformerActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performer_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('performer_id')->nullable();
            $table->decimal('number', 8, 2);
            $table->enum('status', ['new', 'done'])->default('new');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('set null');
            $table->foreign('performer_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performer_activities');
    }
}
