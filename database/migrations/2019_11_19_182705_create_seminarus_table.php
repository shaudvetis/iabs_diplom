<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeminarusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /**
     таблица справочник семинаров
     */
    public function up()
    {
        Schema::create('seminarus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('direction')->comment('направление');
            $table->integer('npp')->comment('нумерация');
            $table->integer('element')->comment('учбовий елемент');
            $table->string('seminar_title')->comment('Название семинара');
            $table->integer('bal')->comment('возможный бал');
            $table->integer('kafedra')->comment('Название кафедры');
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
        Schema::dropIfExists('seminarus');
    }
}
