<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNightpracticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nightpractics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('fio')->comment('Фио больного');
            $table->text('num_card')->comment('Номер стац карты');
            $table->date('apdate')->comment('Дата начала и конца');
            $table->longText('diagnoses',500)->comment('Cодержимое элемента');
            $table->text('work')->comment('Що зроблено');
            $table->longText('practic')->comment('Виконані маніпуляції');
            $table->text('station_2')->comment('Інше роботи');
            $table->text('date_work')->comment('Дата роботи');
            $table->text('time_work')->comment('Час роботи');
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
        Schema::dropIfExists('nightpractics');
    }
}
