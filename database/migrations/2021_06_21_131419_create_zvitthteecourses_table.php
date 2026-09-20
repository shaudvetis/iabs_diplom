<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZvitthteecoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zvitthteecourses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->comment('intern');
            $table->text('form')->comment('очна  1 заочна 2 ');
            $table->integer('direction_id')->comment('напрямок');
            $table->integer('course');
            $table->integer('ball');
            $table->integer('comm')->comment('coment');
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
        Schema::dropIfExists('zvitthteecourses');
    }
}

