<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDownloadProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('download_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_student');
            $table->string('pasport')->nullable();
            $table->string('diplom')->nullable();
            $table->string('ident_code')->nullable();
            $table->string('diplom_compl')->nullable();
            $table->string('certificate')->nullable();
            $table->string('health_book')->nullable();
            $table->string('foto')->nullable();
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
