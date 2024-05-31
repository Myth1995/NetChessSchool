<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('mini_desc')->nullable();
            $table->string('description');
            $table->integer('instructor');
            $table->integer('price')->nullable();
            $table->string('image_url')->nullable();
            $table->integer('duration')->nullable();
            $table->enum('duration_type', ['hour','minute','secound'])->default('minute');
            $table->string('category')->nullable();
            $table->tinyInteger('parent')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service');
    }
};
