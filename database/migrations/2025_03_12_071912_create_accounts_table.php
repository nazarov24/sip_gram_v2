<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedInteger('model_id');
            $table->string('model_type'); 
            $table->timestamps(); 
            $table->softDeletes(); 
            
            
            $table->unique(['model_type', 'model_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};

