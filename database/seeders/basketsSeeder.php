<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class basketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        DB::table('lib_baskets')->delete();

        DB::table('lib_baskets')->insert([
            'id' => random_int(1000000000, 9999999999), // Generate a random bigint value
            'basket_size' => "Big Basket",
            'basket_item' =>'["1\/2 doz Native Eggs","1\/4 Ampalaya Shoots(Native)"]',
            'basket_amount' => '1699',
            'from' => '2023-07-15',
            'to' => '2023-07-20',
            'created_at' => now(),
            'updated_at' => NULL,
            'deleted_at' => NULL,
        ]);

        DB::table('lib_baskets')->insert([
            'id' => random_int(1000000000, 9999999999), // Generate a random bigint value
            'basket_size' => "Medium Basket",
            'basket_item' =>'["1\/2 doz Native Eggs","1\/4 Ampalaya Shoots(Native)"]',
            'basket_amount' => '1699',
            'from' => '2023-07-15',
            'to' => '2023-07-20',
            'created_at' => now(),
            'updated_at' => NULL,
            'deleted_at' => NULL,
        ]);

        DB::table('lib_baskets')->insert([
            'id' => random_int(1000000000, 9999999999), // Generate a random bigint value
            'basket_size' => "Small Basket",
            'basket_item' =>'["1\/2 doz Native Eggs","1\/4 Ampalaya Shoots(Native)"]',
            'basket_amount' => '1699',
            'from' => '2023-07-15',
            'to' => '2023-07-20',
            'created_at' => now(),
            'updated_at' => NULL,
            'deleted_at' => NULL,
        ]);
    }
}
