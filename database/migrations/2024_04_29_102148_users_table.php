<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
       
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('office_id');
            $table->unsignedBigInteger('department_id');
            $table->string('role_id');
            $table->string('role');
            $table->string('name');
            $table->string('username');
            $table->string('description');
            $table->string('avatar');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('status', ['I', 'A', 'H', 'S']);
            $table->rememberToken();
            $table->timestamp('last_login')->default(now());
            $table->timestamp('last_logout')->nullable();
            $table->string('active', 5)->default('Non');
            $table->timestamps();
            $table->text('session_id')->nullable();

            // Foreign key constraints
            $table->foreign('office_id')->references('id')->on('offices');
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
