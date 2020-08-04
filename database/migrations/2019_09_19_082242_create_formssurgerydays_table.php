<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormssurgerydaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formssurgerydays', function (Blueprint $table) {
             $table->bigIncrements('id');
             $table->text('direction');
            $table->text('viewsurgery', 255)->comment('Cодержимое элемента');
            $table->text('num_card')->comment('Номер стац карты');
            $table->text('type_work')->comment('Вид работы');
            $table->text('apdate')->comment('дата');
            $table->text('num_surgery')->comment('номер операції');
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
        Schema::dropIfExists('formssurgerydays');
    }
}
