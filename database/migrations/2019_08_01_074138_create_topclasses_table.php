<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopclassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topclasses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255)->comment('Название элемента');
            $table->longText('value', 255)->comment('Cодержимое элемента');
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
        Schema::dropIfExists('topclasses');
    }
}
