<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTariffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariffs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('type_lantl_id')->nullable();
            $table->integer('sort')->default(999);
            $table->tinyInteger('is_sdrive')->default(1);
            $table->text('description')->nullable();
            $table->timestamps();
            $table->text('icon')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->tinyInteger('auto_assignment')->default(1);
            $table->unsignedBigInteger('base_lantl_id')->nullable();
            $table->text('reason_sdrive_version')->nullable();
            $table->double('coefficient')->default(1);
            $table->unsignedBigInteger('calc_type_id')->nullable();
            $table->tinyInteger('is_sdrive_version')->default(0);
            $table->integer('active_version')->default(1);
            $table->integer('count_updated')->default(0);
            $table->tinyInteger('is_send_path_new_order')->default(1);
            $table->integer('price_rounding')->default(0);
            $table->double('price_by_performers')->default(0);
            $table->integer('stats')->nullable();
            $table->integer('radius_auto_assignment')->default(1500);
            $table->timestamp('deleted_at')->nullable();
            $table->tinyInteger('is_default')->default(0);

            // Foreign key constraints
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('base_lantl_id')->references('id')->on('tariffs')->onDelete('set null');

            // Unique constraint
            $table->unique(['name', 'division_id'], 'tariffs_name_division_id_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tariffs');
    }
}