<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllsemballsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allsemballs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->comment('student');
            $table->integer('direction')->comment('napravlenie');
            $table->integer('allseminar')->comment('sumseminar');
            $table->integer('kyracia')->comment('sumkyracia');
            $table->integer('test')->comment('sumtest');
            $table->integer('allball');
            $table->integer('ects');
            $table->integer('ballfinish');
            $table->integer('comment');
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
        Schema::dropIfExists('allsemballs');
    }
}

