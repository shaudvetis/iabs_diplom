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
            $table->string('email', 255)->comment('email');
            $table->string('surname', 255);
            $table->string('name', 255);
            $table->string('lastname', 255);
            $table->string('gender', 255);
            $table->string('surnamefirst', 255)->comment('фио ранее');
            $table->string('country', 255)->comment('проживание студента');
            $table->string('city', 255);
            $table->string('village', 255);
            $table->integer('index');
            $table->string('adress', 255);
            $table->string('house', 255);
            $table->string('apartment', 255);
            $table->integer('telm')->comment('тел моб');
            $table->integer('telc')->comment('тел дом');
            $table->string('country1', 255)->comment('прописка студента');
            
            $table->string('city1', 255);
            $table->string('village1', 255);
            $table->integer('index1');
            $table->string('adres1', 255);
            $table->string('house1', 255);
            $table->string('apartment1', 255);
            $table->string('country2', 255)->comment('родители');
            $table->string('city2', 255);
            $table->string('village2', 255);
            $table->string('index2', 255);
            $table->string('adres2', 255);
            $table->integer('tel1');

 
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
