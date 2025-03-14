<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePCCommentTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_c_comment_templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('output_comment');
            $table->unsignedBigInteger('p_c_status_id');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_c_comment_templates');
    }
}
