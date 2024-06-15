<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('office_id');
            $table->unsignedBigInteger('department_id');
            $table->string('name');
            $table->text('description');
            $table->string('letter');
            $table->integer('start');
            $table->string('temps_estimer');
            $table->string('catche_up_date')->nullable();
            $table->enum('status', ['I', 'A', 'H', 'S']);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('office_id')->references('id')->on('offices');
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     * * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operations');

    }
};
