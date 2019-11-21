<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormspracticedaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formspracticedays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('get_skills', 255)->comment('Cодержимое элемента');
            $table->integer('sum_number')->comment('Кількість');
            $table->integer('id_student')->comment('Код студента');
            $table->text('direction', 255);
          
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
        Schema::dropIfExists('formspracticedays');
    }
}
