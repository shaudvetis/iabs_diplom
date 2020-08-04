<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHourFioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hour_fio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('teacher_id');
            $table->integer('days')->comment('Тривалість циклу дні');
            $table->integer('week')->comment('Тривалість циклу тижні');
            $table->integer('hours')->comment('часи');
            $table->text('id_direction')->comment('Модуль');
            $table->integer('kafedra_id')->comment('кафедра');
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
        Schema::dropIfExists('hour_fio');
    }
}
