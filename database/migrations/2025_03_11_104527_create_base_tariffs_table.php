<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseTariffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_tariffs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->double('price_advertising');
            $table->double('price_by_performers');
            $table->double('price_hour');
            $table->double('price_km_city');
            $table->double('price_km_intercity');
            $table->integer('price_rounding')->default(2);
            $table->double('free_waiting_of_client_in_minute');
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_archive');
            $table->tinyInteger('is_send_push_new_order')->default(1);
            $table->tinyInteger('is_working')->default(1);
            $table->double('min_penalty');
            $table->double('min_price');
            $table->integer('radius_auto_assignment')->default(1500);
            $table->text('reason_active_version')->nullable();
            $table->integer('seats')->nullable();
            $table->integer('sort')->default(999);
            $table->unsignedBigInteger('type_tariff_id');
            $table->timestamp('updated_at')->nullable();
            $table->unsignedBigInteger('updated_id')->nullable();
            $table->integer('active_version')->default(1);
            $table->tinyInteger('auto_assignment');
            $table->timestamp('block_date_time')->nullable();
            $table->unsignedBigInteger('calc_type_id')->nullable();
            $table->double('check_in_price');
            $table->double('coefficient')->default(1);
            $table->enum('color', ['white','red','green']); 
            $table->integer('count_updated');
            $table->timestamp('created_at')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->double('delivery_price');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('division_id');
        
         

      
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->foreign('type_tariff_id')->references('id')->on('type_tariffs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('base_tariffs');
    }
}
