<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInputformsdaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inputformsdays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('diagnoses',500)->comment('Cодержимое элемента');
            $table->longText('mkb',500)->comment('Диагноз мкб');
            $table->text('num_card')->comment('Номер стац карты');
            $table->date('apdate')->comment('Дата начала');
            $table->date('apdate_end')->comment('Дата конца');
            $table->date('comm')->comment('coments');
            $table->integer('id_student')->comment('Код студента');
            $table->text('fio')->comment('Фио больного');
            $table->text('direction')->comment('Направление');

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
        Schema::dropIfExists('inputformsdays');
    }
}
