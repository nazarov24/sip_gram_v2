<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromocodeUsageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promocode_usage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('promocode_id');
            $table->string('status', 255)->default('0');
            $table->timestamps();
            $table->string('model_type', 255)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->double('premium')->default(0);
            $table->unsignedBigInteger('bonus_id')->nullable();
            $table->string('order_client', 255)->default('0');
            $table->integer('count')->default(0);
            $table->timestamp('expires_at')->nullable();
            $table->timestamp('deleted_at')->nullable();

            // Foreign key constraints
            $table->foreign('promocode_id')->references('id')->on('promocode')->onDelete('cascade');
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
        Schema::dropIfExists('promocode_usage');
    }
}
