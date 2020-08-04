<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcenkiTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     /**
     таблица оценки интернов
     */
    public function up()
    {
        Schema::create('ocenki_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->comment('Код студента');
            $table->integer('id_seminarus')->comment('id_seminar из таблицы seminarus');
            $table->integer('element')->comment('element из таблицы seminar_tema');
            $table->integer('bal')->comment('бал');
            $table->integer('morning')->comment('теор бал');
            $table->integer('lessons')->comment('теор бал');
            $table->integer('teor_bal')->comment('теор бал');
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
        Schema::dropIfExists('ocenki_tables');
    }
}
