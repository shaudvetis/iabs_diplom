<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanrozkladsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planrozklads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->comment('tiacher');
            $table->integer('seminar_title')->comment('тема семинара');
            $table->text('date')->comment('очна  1 заочна 2 ');
            $table->text('pract')->comment('очна  1 заочна 2 ');
            $table->text('seminar')->comment('очна  1 заочна 2 ');
            $table->integer('course');
            $table->integer('decatki');
            $table->integer('year');
            $table->integer('ball');
            $table->integer('comm1')->comment('coment');
            $table->integer('comm2')->comment('coment');
            $table->integer('comm3')->comment('coment');
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
        Schema::dropIfExists('planrozklads');
    }
}

