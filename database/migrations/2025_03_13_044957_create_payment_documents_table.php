<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('division_id');
            $table->string('model_payment', 255);
            $table->unsignedBigInteger('model_payment_id');
            $table->unsignedBigInteger('user_id');
            $table->text('comment');
            $table->double('amount');
            $table->timestamps();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->enum('status', ['CANCEL', 'PAYMENT', 'CHARGE'])->default('PAYMENT');
            $table->string('type_name', 255)->nullable();
            $table->string('status_text', 255)->nullable();
            $table->string('created_user_login', 255)->nullable();

            // Foreign key constraints
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');

            // Indexes
            $table->index('type_name', 'payment_documents_type_name_index');
            $table->index('status_text', 'payment_documents_status_text_index');
            $table->index('created_user_login', 'payment_documents_created_user_login_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_documents');
    }
}
