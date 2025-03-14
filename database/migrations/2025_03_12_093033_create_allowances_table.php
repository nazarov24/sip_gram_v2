<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllowancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allowances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pattern_allowance_id')->nullable();
            $table->tinyInteger('performer_show');
            $table->double('price');
            $table->tinyInteger('replace_base_price_order');
            $table->tinyInteger('require_parameter');
            $table->tinyInteger('site_show');
            $table->enum('type', ['percent','fix','minute','custom_type','custom_not_add_to_price','custom_type_multiply']); 
            $table->timestamp('updated_at')->nullable();
            $table->smallInteger('user_id')->nullable();
            $table->tinyInteger('user_show');
            $table->tinyInteger('addr_type_relation');
            $table->tinyInteger('add_min_price');
            $table->tinyInteger('client_show');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('discount_show');
            $table->tinyInteger('hourly');
            $table->string('icon')->nullable();
            $table->tinyInteger('inter_city');
            $table->tinyInteger('in_city');
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_min_price');
            $table->tinyInteger('is_require');
            $table->string('name');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allowances');
    }
}
