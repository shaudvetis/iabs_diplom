<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtestatProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atestat_profiles', function (Blueprint $table) {
       $table->bigIncrements('id');
       $table->integer('user_id');
       $table->integer('course_id');
       $table->string('credits', 255)->nullable();
       $table->string('hours', 255)->nullable();
       $table->string('marks', 255)->nullable();
       $table->string('nac_grade', 255)->nullable();
       $table->string('ects_grade', 255)->nullable();
       $table->string('all_grade', 255)->comment('всего години 2 кол')->nullable();
       $table->string('total_marks', 255)->comment('всего кредитов 1 кол')->nullable();
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
        Schema::dropIfExists('atestat_profiles');
    }
}
