<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('created_at')->nullable();
            $table->decimal('distance', 10, 2); 
            $table->decimal('driver_balance', 10, 2); 
            $table->decimal('lat', 20, 16)->default(0.0000000000000000); 
            $table->decimal('lng', 20, 16)->default(0.0000000000000000); 
            $table->decimal('order_commission', 10, 2); 
            $table->unsignedBigInteger('ordered');
            $table->unsignedBigInteger('performer_id');
            $table->decimal('rating', 3, 2); 
            $table->unsignedBigInteger('request_processing_id')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->enum('type', ['manually']); 
            $table->timestamp('updated_at')->nullable();
            $table->decimal('weight', 10, 2); 

            // Foreign key 
            $table->foreign('performer_id')->references('id')->on('performers')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('assignment_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignment_logs');
    }
}
