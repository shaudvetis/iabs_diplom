<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePractNavsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pract_navs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('pract_name')->comment('назва');
            $table->integer('napr_id')->comment('ид направления');
            $table->integer('kafedra_id');
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
        Schema::dropIfExists('pract_navs');
    }
}
