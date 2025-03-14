<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformerCardTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performer_card_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('code', 255);
            $table->tinyInteger('is_active')->default(1);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('update_user_id')->nullable();
            $table->timestamps();
            $table->string('icon', 255)->nullable();
            $table->integer('sort')->default(1);

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('update_user_id')->references('id')->on('users')->onDelete('set null');

            // Indexes
            $table->index('code', 'performer_card_types_code_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performer_card_types');
    }
}
