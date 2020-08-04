<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKrokSurgeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('krok_surgeries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('vk');
            $table->string('bt');
            $table->string('bin');
            $table->string('bs');
            $table->string('bak');
            $table->string('bp');
            $table->string('pk');
            $table->string('year1');
            $table->string('year2');
            $table->string('kz');
            $table->integer('ocenka');
            $table->string('sum');
            $table->integer('kafedra');
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
        Schema::dropIfExists('krok_surgeries');
    }
}
