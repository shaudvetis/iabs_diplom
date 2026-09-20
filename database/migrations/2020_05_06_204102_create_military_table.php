<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMilitaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('military', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('id_seminar');
            $table->integer('id_seminarus');
            $table->integer('tema');
            $table->integer('element');
            $table->integer('bal');
            $table->integer('morning');
            $table->integer('lessons');
            $table->integer('teor_bal');
            $table->integer('kafedra');
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
        Schema::dropIfExists('military');
    }
}
