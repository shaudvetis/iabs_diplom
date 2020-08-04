<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeminarTemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     /**
     таблица темы семинаров
     */
    public function up()
    {
        Schema::create('seminar_temas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_seminar')->comment('Название семинара');
            $table->integer('npp')->comment('номер семинара');
            $table->integer('element')->comment('учбовий елемент');
            $table->text('tema')->comment('тема семинара');
            $table->text('pract_nav')->comment('практ навычки');
            $table->text('teor_nav')->comment('теор навычки');
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
        Schema::dropIfExists('seminar_temas');
    }
}
