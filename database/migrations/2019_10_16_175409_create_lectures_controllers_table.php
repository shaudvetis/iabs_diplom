<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturesControllersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures_controllers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title')->comment('Lekcii title');
            $table->string('slug')->unique()->comment('Lekcii slug');
            $table->longText('content')->comment('Lekcii content');
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
        Schema::dropIfExists('lectures_controllers');
    }
}
