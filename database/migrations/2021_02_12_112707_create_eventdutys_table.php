<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventdutysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventdutys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('vid')->comment('отделения');
            $table->integer('priom_id')->comment('приймальне піб');
            $table->integer('vid_id')->comment('відповідальний піб');
            $table->integer('brigada_id')->comment('бригада піб');
            $table->integer('user_id')->comment('інтерн піб');
            $table->string('title');
            $table->date('start');
            $table->date('end');
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
        Schema::dropIfExists('eventdutys');
    }
}
