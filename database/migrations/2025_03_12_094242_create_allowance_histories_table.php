<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllowanceHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allowance_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('addr_type_relation');
            $table->tinyInteger('add_min_price');
            $table->unsignedBigInteger('allowance_id')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->tinyInteger('discount_show');
            $table->tinyInteger('hourly');
            $table->tinyInteger('inter_city');
            $table->tinyInteger('in_city');
            $table->tinyInteger('is_min_price');
            $table->tinyInteger('is_require');
            $table->string('model')->nullable();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->unsignedBigInteger('parrent_id')->nullable();
            $table->unsignedBigInteger('pattern_allowance_id')->nullable();
            $table->tinyInteger('replace_base_price_order');
            $table->tinyInteger('require_parameter');
            $table->string('step')->nullable();
            $table->timestamp('updated_at')->nullable();

            // Foreign key constraints
            $table->foreign('allowance_id')->references('id')->on('allowances')->onDelete('set null');
            $table->foreign('parrent_id')->references('id')->on('allowance_histories')->onDelete('set null');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allowance_histories');
    }
}
