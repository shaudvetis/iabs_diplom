<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormssurgeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formssurgeries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('viewsurgery', 255)->comment('Cодержимое элемента');
            $table->text('num_card')->comment('Номер стац карты');
            $table->text('type_work')->comment('Вид работы');
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
        Schema::dropIfExists('formssurgeries');
    }
}
