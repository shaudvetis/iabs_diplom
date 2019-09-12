<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGetSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('get_skills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('get_skills', 255)->comment('Cодержимое элемента');
            $table->integer('sum_number')->comment('Кількість');
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
        Schema::dropIfExists('get_skills');
    }
}
