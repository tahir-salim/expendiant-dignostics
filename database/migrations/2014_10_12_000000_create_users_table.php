<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role_id')->nullable();
            $table->foreignId('hospital_id')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('phone')->nullable();
            $table->enum('gender', ['male', 'female', 'others'])->nullable();
            $table->integer('age')->nullable();
            $table->string('country')->nullable();
            $table->longText('address')->nullable();
            $table->longText('address2')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
