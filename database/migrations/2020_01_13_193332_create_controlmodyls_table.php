<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateControlmodylsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controlmodyls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->comment('Код студента');
            $table->integer('id_seminarus')->comment('id_seminar из таблицы seminarus');
            $table->integer('one');
            $table->integer('two');
            $table->integer('three');
            $table->integer('four');
            $table->integer('five');
            $table->integer('six');
            $table->integer('seven');
            $table->integer('eight');
            $table->integer('nine');
            $table->integer('ten');
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
        Schema::dropIfExists('controlmodyls');
    }
}
