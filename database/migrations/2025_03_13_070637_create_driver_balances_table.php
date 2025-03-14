<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverBalancesTable extends Migration
{
    public function up()
    {
        Schema::create('driver_balances', function (Blueprint $table) {
            $table->unsignedBigInteger('performer_id');
            $table->decimal('balance', 10, 2)->default(0.00);
            $table->decimal('additional_balance', 10, 2)->default(0.00);
            $table->decimal('premium', 10, 2)->default(0.00);
            $table->string('premium_status_id', 255)->nullable();
            $table->timestamps();
            $table->string('bonus_account_expires', 255)->nullable();
            $table->timestamp('deleted_at')->nullable();

            // Foreign key constraint
            $table->foreign('performer_id')->references('id')->on('performers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('driver_balances');
    }
}