<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRozkladModulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rozklad_moduls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_napravlenie')->comment('направление');
            $table->integer('id_teacher')->comment('преподаватель');
            $table->integer('decatki')->comment('десяток');
            $table->integer('course')->comment('курс');
            $table->integer('dates')->comment('дата с');
            $table->integer('datep')->comment('дата по');
            $table->integer('year')->comment('год');
            $table->integer('in_day')->comment('кол-во дней');
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
        Schema::dropIfExists('rozklad_moduls');
    }
}
