<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class usersSeeder extends Seeder 
{
    public function run() {
        if(DB::table('users')->count() <= 0) {
            DB::table('users')
                ->insert([
                    'name' => 'Sahei Admin',
                    'email' => 'saheiadmin@gmail.com',
                    'password' => '$2a$12$YJ806tD38RL/UoRNkNprm..QY23PqJ3J6Aj2U96qUQJpPHsbzRj/C',
                    'customer_ref' => 'SA20230000',
                    'role' => 'Admin',
                ]);
            DB::table('customers')->delete();
            DB::table('customers')
                ->insert([
                    'customer_fname' => 'Sahei',
                    'customer_lname' => 'Admin',
                    'customer_ref' => 'SA20230000',
                    'user_email' => 'saheiadmin@gmail.com',
                    'password' => '$2a$12$YJ806tD38RL/UoRNkNprm..QY23PqJ3J6Aj2U96qUQJpPHsbzRj/C',
                    'contact_number' => '09123457890',
                    'main_delivery_addr_house_num' => '0',
                    'main_delivery_addr_brgy_code' => '141102065',
                    'main_delivery_addr_muncity_code' => '141102000',
                    'main_delivery_addr_province_code' => '141100000',
                    'main_delivery_addr_brgy' => 'MAGSAYSAY, LOWER',
                    'main_delivery_addr_muncity' => 'BAGUIO CITY',
                    'main_delivery_addr_province' => 'Benguet',
                    'role' => 'Admin',
                ]);
        }
    }
}
