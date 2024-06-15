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
        Schema::create('statistiques', function (Blueprint $table) {
            $table->id();
            $table->string('counter', 10);
            $table->unsignedBigInteger('department_id');
            $table->string('operations_id', 50)->nullable();
            $table->unsignedBigInteger('office_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('queue_id');
            $table->timestamp('date_imprission')->nullable();
            $table->timestamp('date_appel')->nullable();
            $table->timestamp('date_traitement')->nullable();
            $table->timestamp('date_transfer')->nullable();
            $table->unsignedBigInteger('transfere_a')->nullable();
            $table->integer('nb_rappel')->nullable();
            $table->string('status', 10);
            $table->integer('temps_de_traitement')->nullable();
            $table->integer('temps_d_attente')->nullable();
            $table->timestamp('date_absent')->nullable();
            $table->unsignedBigInteger('id_user_transfer_traite')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('office_id')->references('id')->on('offices');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('queue_id')->references('id')->on('queues');
            $table->foreign('transfere_a')->references('id')->on('users');
            $table->foreign('id_user_transfer_traite')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statistiques');
    }
};
