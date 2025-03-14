<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromocodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promocode', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model_type', 255);
            $table->string('promo_code', 255);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->unsignedBigInteger('promocode_type_id')->nullable();
            $table->unsignedBigInteger('organization_id')->nullable();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->integer('count_activation')->nullable();
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->string('created_by', 255)->nullable();
            $table->double('amount')->default(0);
            $table->timestamp('start_time')->nullable();
            $table->tinyInteger('is_active')->default(0);
            $table->text('comment')->nullable();
            $table->timestamp('end_time')->nullable();

            
            $table->foreign('promocode_type_id')->references('id')->on('promocode_types')->onDelete('set null');
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('set null');
            $table->foreign('created_by_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promocode');
    }
}
