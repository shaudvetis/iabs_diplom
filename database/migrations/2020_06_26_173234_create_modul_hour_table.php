<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulHourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modul_hour', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('napravlenie')->comment('направление');
            $table->text('name_baza')->comment('Назва бази');
            $table->text('hours')->comment('часи');
            $table->text('days')->comment('дни');
            $table->text('kafedra_id')->comment('кафедра');
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
        Schema::dropIfExists('modul_hour');
    }
}
