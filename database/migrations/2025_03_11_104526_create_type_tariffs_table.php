<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeTariffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_tariffs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->unsignedBigInteger('division_id')->default(1);
            $table->string('code', 255)->nullable();
            $table->string('icon', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->tinyInteger('site_show')->default(1);
            $table->tinyInteger('app_show')->default(1);
            $table->unsignedBigInteger('category_car_id')->nullable();
            $table->text('dop_info')->nullable();
            $table->text('description_app')->nullable();
            $table->string('client_hint', 255)->nullable();
            $table->unsignedBigInteger('created_by')->default(1);
            $table->unsignedBigInteger('category_tariff_id')->nullable();
            $table->tinyInteger('is_active')->default(1);

            // Foreign key constraints
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->foreign('category_car_id')->references('id')->on('category_cars')->onDelete('set null');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_tariffs');
    }
}
