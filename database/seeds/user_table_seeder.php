<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class user_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        //insert data to admin
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Password'),
            'created_at' => '2021-03-01 00:00:00',
            'updated_at' => '2021-03-01 00:00:00',
            'role' => '1'
        ]);

        //insert author sejumlah $i menggunakan faker
        for($i = 2; $i <= 10; $i++){
            DB::table('users')->insert([
            'id' => $i,
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => Hash::make('Password'),
            'created_at' => '2021-03-01 00:00:00',
            'updated_at' => '2021-03-01 00:00:00',
            'role' => '2'
            ]);
        }
    }
}
