<?php

use Illuminate\Database\Seeder;
// This class to execute all the seeders that we have 
// 
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
     

        DB::table('users')->insert([
            [
                "name" => "Marwa ",
                "email" => "admin@gmail.com",
                "numtel" => 22555333,
                "adresse" => "tunis",
                "grade" => "agent administratif",
                "password" => Hash::make("adminadmin"),
            ]
        ]);
    }
}
