<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInputControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('input_controls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->comment('Код студента');
            $table->integer('bal1')->comment('оценка вхідний контроль');
            $table->text('bal2')->comment('бал');
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
        Schema::dropIfExists('input_controls');
    }
}
