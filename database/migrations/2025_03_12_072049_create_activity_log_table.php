<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('activity_log', function (Blueprint $table) {
            $table->id(); 
            $table->string('log_name')->nullable();
            $table->text('description')->nullable();
            $table->json('properties')->nullable(); 
            
            $table->bigInteger('causer_id')->nullable();
            $table->string('causer_type')->nullable();
            $table->bigInteger('subject_id')->nullable();
            $table->string('subject_type')->nullable();

            $table->timestamps(); 

            $table->index('log_name', 'activity_log_log_name_index');
            $table->index(['causer_id', 'causer_type'], 'causer');
            $table->index(['subject_id', 'subject_type'], 'subject');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_log');
    }
};

