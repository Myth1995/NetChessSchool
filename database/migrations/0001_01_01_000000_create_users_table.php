<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('user_name')->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->enum('gender', ['male','female'])->default('male');
            $table->string('avatar')->nullable();
            $table->float('ncs_coin',8,2)->default(0);
            $table->integer('sponser_id')->nullable();
            $table->date('birthday');
            $table->string('age');
            $table->string('country');
            $table->string('phone_number')->nullable();
            $table->string('permission')->default("customer");
            $table->dateTime("last_login")->nullable();
            $table->tinyInteger('status')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

        $password = "admin" . random_int(100000, 999999);

        DB::table('users')->insert(
            [
                'email' => 'Info@Networkchessschool.Com',
                'user_name' => 'teacher',
                'first_name' => 'John',
                'last_name' => 'Smith',
                'password' => $password,
                'avatar' => 'teacher.jpg',
                'sponser_id' => 0,
                'birthday' => '1987-05-05',
                'age' => 'adult',
                'country' => 'poland',
                'phone_number' => '12345678',
                'permission' => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
