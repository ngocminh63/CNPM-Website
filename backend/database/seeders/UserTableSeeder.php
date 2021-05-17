<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [
    		['id'=>1, 'fullname' => 'Admin', 'password'=>'$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'email' => 'admin@gmail.com', 'phone' => '0395954444', 'level' => 2],
    		['id'=>2, 'fullname' => 'Dev01', 'password'=>'$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'email' => 'dev01@gmail.com', 'phone' => '0395954444', 'level' => 1],
    	];
    	DB::table('users')->delete();
        DB::table('users')->insert($data);
    }
}
