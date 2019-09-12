<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDownaldProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('downald_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_student');
            $table->string('pasport');
            $table->string('diplom');
            $table->string('ident_code');
            $table->string('diplom_compl');
            $table->string('certificate');
            $table->string('health_book');
            $table->string('foto');
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
        Schema::dropIfExists('downald_profiles');
    }
}
