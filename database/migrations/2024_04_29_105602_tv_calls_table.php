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
        Schema::create('tv_calls', function (Blueprint $table) {
            $table->increments('id');
            $table->char('ticket', 20)->nullable();
            $table->string('guichet', 20);
            $table->timestamp('date_creation')->default(now());
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *  @return void
     */
    public function down()
    {
        Schema::dropIfExists('tv_calls');

    }
};
