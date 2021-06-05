<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
    		['id'=>1, 'fullname' => 'khach hang 01', 'password'=>'$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'email' => 'kh01@gmail.com', 'phone' => '0444444444', 'gender' => 2, 'address' =>'hà nội'],
    		['id'=>2, 'fullname' => 'khach hang 02', 'password'=>'$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'email' => 'kh02@gmail.com', 'phone' => '0333333333', 'gender' => 1, 'address' =>'hà nam'],
    		['id'=>3, 'fullname' => 'khach hang 03', 'password'=>'$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'email' => 'kh03@gmail.com', 'phone' => '0555554444', 'gender' => 2, 'address' =>'hà tây'],
            ['id'=>4, 'fullname' => 'khach hang 04', 'password'=>'$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'email' => 'kh04@gmail.com', 'phone' => '0225554444', 'gender' => 1, 'address' =>'hà đông'],
    		['id'=>5, 'fullname' => 'khach hang 05', 'password'=>'$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'email' => 'kh05@gmail.com', 'phone' => '0565554444', 'gender' => 2, 'address' =>'hà tĩnh'],
    		['id'=>6, 'fullname' => 'khach hang 06', 'password'=>'$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'email' => 'kh06@gmail.com', 'phone' => '0555884444', 'gender' => 1, 'address' =>'hà bắc'],
    		['id'=>7, 'fullname' => 'khach hang 07', 'password'=>'$2y$10$ooPG9s1lcwUGYv1nqeyNcO0ccYJf8hlhm5dJXy7xoamvgiczXHB7S', 'email' => 'kh07@gmail.com', 'phone' => '0555362444', 'gender' => 2, 'address' =>'hà giang'],

        
        
        ];
    	DB::table('customers')->delete();
        DB::table('customers')->insert($data);
    }
}
