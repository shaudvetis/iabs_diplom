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
    public function up()
    {
        Schema::create('nightworkdays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('practic')->comment('Участь у оперативних втручаннях');
            $table->longText('diagnoses',500)->comment('Cодержимое элемента');
            $table->text('num_card')->comment('Номер стац карты');
            $table->date('apdate')->comment('Дата начала и конца');
            $table->text('fio')->comment('Фио больного');
            $table->text('work')->comment('Виконані маніпуляції');
            $table->text('station')->comment('Місце роботи');
            $table->date('date_arrival')->comment('дата госпитал');
            $table->time('time_arrival')->comment('година госпитал');
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
