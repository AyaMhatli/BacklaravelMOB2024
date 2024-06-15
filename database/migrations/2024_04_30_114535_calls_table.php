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
        Schema::create('calls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('office_id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('operation_id');
            $table->unsignedBigInteger('queue_id');
            $table->unsignedBigInteger('counter_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('number');
            $table->date('called_date');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('office_id')->references('id')->on('offices');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('operation_id')->references('id')->on('operations');
            $table->foreign('queue_id')->references('id')->on('queues');
            $table->foreign('counter_id')->references('id')->on('counters');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calls');
    }
};
