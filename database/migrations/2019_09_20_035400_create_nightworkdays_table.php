<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNightworkdaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // Это вторая таблица
    public function up()
    {
        Schema::create('nightworkdays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('date_work')->comment('чергування');
            $table->integer('baza');
            $table->integer('time_work');
            $table->integer('station_work')->comment('Місце чергування');
            $table->text('fio')->comment('Фио больного');
            $table->longText('diagnosespriom',500)->comment('Cодержимое элемента');
            $table->integer('otkaz');
            $table->integer('gosp');
            $table->text('num_cardotkaz')->comment('Номер стац карты');
            $table->text('prichina');
            $table->text('manipulaciiotkaz');
            $table->integer('type_workotkaz')->comment('Вид участі');
            $table->text('num_card')->comment('Номер стац карты');
            $table->text('work')->comment('Виконані маніпуляції');
            $table->integer('type_workgosp')->comment('Вид участі');
            $table->longText('fiostacionar');
            $table->text('num_cardstacionar')->comment('Номер стац карты');
            $table->longText('diagnosesstac',500)->comment('Cодержимое элемента');
            $table->integer('type_workstac')->comment('Вид участі');
            $table->integer('direction');        
            $table->integer('id_student')->comment('Код студента');
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
        Schema::dropIfExists('nightworkdays');
    }
}
