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
            $table->longText('pasport')->nullable();
            $table->longText('pasport_two')->nullable();
            $table->longText('pasport_eleven')->nullable();
            $table->longText('pasport_thirteen')->nullable();
            $table->longText('family_status')->nullable();
            $table->longText('diplom')->nullable();
            $table->longText('diplom_two')->nullable();
            $table->longText('ident_code')->nullable();
            $table->longText('diplom_compl')->nullable();
            $table->longText('certificate')->nullable();
            $table->longText('certificate_two')->nullable();
            $table->longText('certificate_krok')->nullable();
            $table->longText('certificate_krok_two')->nullable();
           $table->longText('health_book')->nullable();
            $table->longText('foto')->nullable();
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
