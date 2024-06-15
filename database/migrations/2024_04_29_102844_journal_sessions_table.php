<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *  @return void
     */
    public function up()
    {
        Schema::create('journale_session', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->timestamp('login')->default(now());
            $table->timestamp('logout')->nullable();
            $table->unsignedBigInteger('duree_session')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *  @return void
     */
    public function down()
    {
        Schema::dropIfExists('journale_session');
    }
};
