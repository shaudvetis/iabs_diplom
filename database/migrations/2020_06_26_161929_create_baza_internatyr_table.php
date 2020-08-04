<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBazaInternatyrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baza_internatyr', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_baza')->comment('Код бази - для отделений');
            $table->text('name_baza')->comment('Назва бази');
            $table->integer('form_education')->comment('Вид навчання код');
            $table->text('name_education')->comment('Вид навчання');
            $table->text('name_town')->comment('Місто');
            $table->integer('kafedra_id')->comment('Кафедра');
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
        Schema::dropIfExists('baza_internatyr');
    }
}
