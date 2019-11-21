<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('form')->comment('бюджет контракт');
            $table->string('kafedra');
            $table->string('email')->unique();
            $table->integer('role')->default(0)->comment('0:student; 1:teacher; 2:manager; 3:root');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('course')->default(1)->comment('1:day; 2:noday;');
            $table->varchar('course_name', 20)->default(1)->comment('1:day; 2:noday;');;
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => 'root',
            'role' => 3,
            'email' => 'root@mail.com',
            'password' => bcrypt('root'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
