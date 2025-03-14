<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('division_id');
            $table->string('phone', 255)->nullable();
            $table->string('dop_phone', 255)->nullable();
            $table->string('model', 255)->nullable();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->double('distance')->nullable();
            $table->tinyInteger('auto_assignment')->default(0);
            $table->tinyInteger('not_issued')->default(0);
            $table->tinyInteger('in_time')->default(0);
            $table->dateTime('date_time')->nullable();
            $table->tinyInteger('for_time')->nullable();
            $table->integer('number_of_passengers')->default(0);
            $table->unsignedBigInteger('search_address_id')->nullable();
            $table->text('meeting_info')->nullable();
            $table->text('comment')->nullable();
            $table->text('supervisor_comment')->nullable();
            $table->unsignedBigInteger('order_type_id');
            $table->unsignedBigInteger('tariff_id');
            $table->unsignedBigInteger('status_id')->default(1);
            $table->double('price')->default(0);
            $table->text('info_price')->nullable();
            $table->unsignedBigInteger('price_tariff_id')->nullable();
            $table->string('realtime_key', 255)->nullable();
            $table->dateTime('end_time')->nullable();
            $table->unsignedBigInteger('create_user_id')->nullable();
            $table->timestamps();
            $table->string('step', 255)->nullable();
            $table->text('comment_history')->nullable();
            $table->unsignedBigInteger('order_commission_id')->nullable();
            $table->double('distance_in_city')->unsigned()->nullable();
            $table->double('price_in_city')->unsigned()->nullable();
            $table->double('price_inter_city')->unsigned()->nullable();
            $table->text('geo_json_array')->nullable();
            $table->tinyInteger('free_km')->unsigned()->nullable();
            $table->double('bonus_price')->default(0);
            $table->tinyInteger('active_bonus')->default(0);
            $table->double('price_commission')->default(0);
            $table->timestamp('processing_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->double('allowance_percents_price')->default(0);
            $table->double('allowance_price')->default(0);
            $table->timestamp('start_free_wait_time')->nullable();
            $table->timestamp('end_free_wait_time')->nullable();
            $table->double('price_percent')->default(1);
            $table->unsignedBigInteger('pay_type_id')->nullable();

            // Foreign key constraints
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->foreign('order_type_id')->references('id')->on('order_types')->onDelete('cascade');
            $table->foreign('tariff_id')->references('id')->on('tariffs')->onDelete('cascade');
            $table->foreign('create_user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('price_tariff_id')->references('id')->on('tariffs')->onDelete('set null');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_histories');
    }
}
