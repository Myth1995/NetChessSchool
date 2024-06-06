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
        Schema::create('payment_ncs_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->float('ncs_amount');
            $table->string('payment_type')->default('stripe');
            $table->text('session_id');
            $table->float('payment_amount');
            $table->string('currency')->default('PLN');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_ncs_histories');
    }
};
