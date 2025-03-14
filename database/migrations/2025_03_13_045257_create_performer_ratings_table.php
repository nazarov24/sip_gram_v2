<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformerRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performer_ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('performer_id');
            $table->timestamp('performer_rating_worked_at');
            $table->unsignedSmallInteger('orders_success')->default(0);
            $table->unsignedSmallInteger('orders_auto_assignment')->default(0);
            $table->unsignedSmallInteger('without_contacting_the_operator')->default(0);
            $table->unsignedSmallInteger('at_rush_hour')->default(0);
            $table->unsignedSmallInteger('completed_on_time')->default(0);
            $table->unsignedSmallInteger('orders_in_day')->default(0);
            $table->unsignedSmallInteger('order_with_priority')->default(0);
            $table->unsignedSmallInteger('refusal_from_auto_assignment')->default(0);
            $table->unsignedSmallInteger('waiver_from_performer')->default(0);
            $table->unsignedSmallInteger('late_cancellation')->default(0);
            $table->unsignedSmallInteger('params_call_me')->default(0);
            $table->unsignedSmallInteger('disturbance')->default(0);
            $table->unsignedSmallInteger('client_put_one_ball')->default(0);
            $table->unsignedSmallInteger('client_put_two_ball')->default(0);
            $table->unsignedSmallInteger('client_put_three_ball')->default(0);
            $table->unsignedSmallInteger('client_put_four_ball')->default(0);
            $table->unsignedSmallInteger('client_put_five_ball')->default(0);
            $table->unsignedSmallInteger('client_put_rating')->default(0);
            $table->double('rating')->default(0.98);
            $table->timestamps();
            $table->unsignedBigInteger('setting_rating_id')->default(1);

         
            $table->foreign('performer_id')->references('id')->on('users')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performer_ratings');
    }
}
