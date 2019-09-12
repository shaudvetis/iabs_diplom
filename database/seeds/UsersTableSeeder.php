<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
            'name' => 'student',
            'email' => 'student@mail.com',
            'password' => bcrypt('student'),
        ]);

        DB::table('users')->insert([
            'name' => 'teacher',
            'email' => 'teacher@mail.com',
            'role' => 1,
            'password' => bcrypt('teacher'),
        ]);
        DB::table('users')->insert([
            'name' => 'manager',
            'email' => 'manager@mail.com',
            'role' => 2,
            'password' => bcrypt('manager'),
        ]);

        DB::table('users')->insert([
            'name' => 'root',
            'email' => 'root@mail.com',
            'role' => 3,
            'password' => bcrypt('root'),
        ]);
    }
}
