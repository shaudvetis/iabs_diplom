<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_names', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('position')->comment('должность');
            $table->text('namelong')->comment('ФИО полностью');
            $table->text('nameshort')->comment('ФИО сокр');
            $table->text('comm')->comment('коментар');
            $table->text('personaly')->comment('персональні данні');
            $table->text('kafedra_id')->comment('№ кафедри');
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
        Schema::dropIfExists('teacher_names');
    }
}
