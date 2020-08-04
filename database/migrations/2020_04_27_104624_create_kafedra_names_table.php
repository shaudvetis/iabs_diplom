<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKafedraNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kafedra_names', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('kafedra_id')->comment('№ кафедри');
            $table->text('namelongk')->comment('полностью');
            $table->text('nameshortk')->comment('сокр');
            $table->text('comm')->comment('коментар');
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
        Schema::dropIfExists('kafedra_names');
    }
}
