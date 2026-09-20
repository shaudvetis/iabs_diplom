<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRozkladzsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rozkladzs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->comment('intern');
            $table->text('form')->comment('kontract budget');
            $table->integer('baza_internatyr_id')->comment('osnovna baza');
            $table->integer('otdeleniya_id')->comment('baza');
            $table->text('month')->comment('month');
            $table->text('name_month');
            $table->integer('year');
            $table->integer('year_start')->comment('postyplenie interna');
            $table->integer('years')->comment('дата с');
            $table->integer('yearp')->comment('дата по');
            $table->integer('dates')->comment('дата с');
            $table->integer('kafedra_id')->comment('дата по');
            $table->integer('comm')->comment('coment');
            $table->integer('course')->comment('курс');
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
        Schema::dropIfExists('rozkladzs');
    }
}
