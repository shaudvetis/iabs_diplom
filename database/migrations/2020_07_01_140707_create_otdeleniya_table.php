<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtdeleniyaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otdeleniya', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_baza')->comment('Назва бази');
            $table->text('name_otdeleniya')->comment(' отделения');
            $table->text('location_otd')->comment('локация отделения');
            $table->integer('kafedra_id')->comment('Назва кафедри');
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
        Schema::dropIfExists('otdeleniya');
    }
}
