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
    public function up(): void
    {
        Schema::create('queues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('office_id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('operation_id');
            $table->integer('number');
            $table->integer('called');
            $table->string('temps_estimer');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('office_id')->references('id')->on('offices');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('operation_id')->references('id')->on('operations');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('queues');

    }
};
