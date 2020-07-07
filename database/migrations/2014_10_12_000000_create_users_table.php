<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('name')->nullable();;
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('district_id')->nullable();
            $table->string('national_id')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('photo')->default('avatar.jpg');
            $table->string('document')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->enum('type', ['admin', 'member'])->nullable();
            $table->enum('status', [0, 1])->nullable();
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
}
