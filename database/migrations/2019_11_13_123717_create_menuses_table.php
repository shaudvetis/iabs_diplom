<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->string('title');
            $table->string('url')->unique();
            $table->string('course')->nullable();
            $table->string('form')->nullable();
            $table->text('comments')->nullable();
            $table->text('direction')->nullable();
            $table->tinyInteger('sort_order')->default(0);
            $table->boolean('live')->default(true);
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
        Schema::dropIfExists('menuses');
    }
}
