<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKrokAnestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('krok_anests', function (Blueprint $table) {
             $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('vk');
            $table->string('m1');
            $table->string('m1p');
            $table->string('m2');
            $table->string('m2p');
            $table->string('m3');
            $table->string('m4');
            $table->string('m5');
            $table->string('m6');
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
        Schema::dropIfExists('krok_anests');
    }
}
