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
            $table->enum('duration_type', ['year','month','week','day','hour','minute','secound'])->default('minute');
            $table->string('category')->nullable();
            $table->tinyInteger('parent')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        DB::table('services')->insert(
            [
                'title' => 'TRAINING PACKAGE I',
                'mini_desc' => 'Stationary classes in schools for children (4 x 45 minutes)',
                'description' => 'Stationary classes in schools for children (4 x 45 minutes)',
                'instructor' => 1,
                'price' => 125,
                'image_url' => 'training/1.jpg',
                'duration' => 2,
                'duration_type' => 'week',
                'category' => 'Kurs na Poziomie 2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        DB::table('services')->insert(
            [
                'title' => 'TRAINING PACKAGE II',
                'mini_desc' => 'Online classes for children and adults',
                'description' => 'Online classes for children and adults',
                'instructor' => 1,
                'price' => 125,
                'image_url' => 'training/2.jpg',
                'duration' => 3,
                'duration_type' => 'week',
                'category' => 'Kurs na Poziomie 2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        DB::table('services')->insert(
            [
                'title' => 'TOURNAMENT PACKAGE',
                'mini_desc' => 'Online tournaments for adults',
                'description' => 'Online tournaments for adults',
                'instructor' => 1,
                'price' => 125,
                'image_url' => 'training/3.jpg',
                'duration' => 3,
                'duration_type' => 'week',
                'category' => 'Kurs na Poziomie 2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        DB::table('services')->insert(
            [
                'title' => 'MARKETING PACKAGE',
                'mini_desc' => 'For chess players and others',
                'description' => 'For chess players and others',
                'instructor' => 1,
                'price' => 125,
                'image_url' => 'training/4.jpg',
                'duration' => 3,
                'duration_type' => 'week',
                'category' => 'Kurs na Poziomie 2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service');
    }
};
