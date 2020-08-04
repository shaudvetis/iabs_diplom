<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('user_id');
            $table->integer('decatki', 255)->nullable();
            $table->integer('course', 255)->nullable();
            $table->string('surname', 255)->nullable();
            $table->string('name', 255)->nullable();
            $table->string('lastname', 255)->nullable();
            $table->string('gender', 255)->nullable();
            $table->string('surnamefirst', 255)->comment('фио ранее')->nullable();
            $table->string('fullname_en', 255)->comment('фио на англ')->nullable();
            $table->string('kafedra', 255)->comment('кафедра')->nullable();
            $table->string('date_bak', 255)->comment('дата бакпосев')->nullable();
            $table->string('fl_norm', 255)->comment('флюрограф норма')->nullable();
            $table->string('country', 255)->comment('проживание студента')->nullable();
            $table->string('city', 255)->nullable();
            $table->string('village', 255)->nullable();
            $table->integer('index')->nullable();
            $table->string('adress', 255)->nullable();
            $table->string('house', 255)->nullable();
            $table->string('apartment', 255)->nullable();
            $table->integer('telm')->comment('тел моб')->nullable();
            $table->string('country1', 255)->comment('прописка студента')->nullable();
            $table->string('city1', 255)->nullable();
            $table->string('village1', 255)->nullable();
            $table->integer('index1')->nullable();
            $table->string('adres1', 255)->nullable();
            $table->string('house1', 255)->nullable();
            $table->string('apartment1', 255)->nullable()->nullable();
            $table->string('country2', 255)->comment('родители')->nullable();
            $table->string('city2', 255)->nullable();
            $table->string('village2', 255)->nullable();
            $table->string('index2', 255)->nullable();
            $table->string('adres2', 255)->nullable();
            $table->string('house2', 255)->nullable();
            $table->string('apartment2', 255)->nullable();            
            $table->integer('tel1')->nullable();
            $table->string('country3', 255)->comment('заочная база')->nullable();
            $table->string('city3', 255)->nullable();
            $table->string('village3', 255)->nullable();
            $table->string('index3', 255)->nullable();
            $table->string('adres3', 255)->nullable();
            $table->string('house3', 255)->nullable();
            $table->string('apartment3', 255)->nullable();  
            $table->string('doctor1', 255)->nullable();          
            $table->longText('tel2')->nullable();
            $table->string('bos', 255)->nullable();
            $table->string('boswork', 255)->nullable();
            $table->string('boskat', 255)->nullable();
            $table->string('country4', 255)->comment('розподіл')->nullable();
            $table->string('city4', 255)->nullable();
            $table->string('village4', 255)->nullable();
            $table->string('index4', 255)->nullable();
            $table->string('healt1', 255)->nullable();
            $table->string('adres4', 255)->nullable();  
            $table->string('house4', 255)->nullable();          
            $table->longText('tel3',255)->nullable();
            $table->string('doctor2', 255)->nullable();
           });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }
}
