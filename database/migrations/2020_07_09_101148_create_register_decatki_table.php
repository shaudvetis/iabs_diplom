<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterDecatkiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_decatki', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('course')->comment('курс');
            $table->integer('decatki')->comment('десяток');
            $table->integer('year')->comment('год');
            $table->integer('kafedra_id')->comment('кафедра')->nullable();;
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
        Schema::dropIfExists('register_decatki');
    }
}
