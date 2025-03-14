<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformerReasonCancelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performer_reason_cancelation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->enum('reason_order_type', ['CLIENT', 'PERFORMER', 'USER'])->default('PERFORMER');
            $table->timestamps();
            $table->tinyInteger('is_active')->default(1);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->json('order_statuses')->nullable();
            $table->timestamp('deleted_at')->nullable();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performer_reason_cancelation');
    }
}
