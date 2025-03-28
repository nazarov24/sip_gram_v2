<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('access_routes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('route')->unique(); 
            $table->boolean('is_active')->default(1);
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('access_routes');
    }
};

