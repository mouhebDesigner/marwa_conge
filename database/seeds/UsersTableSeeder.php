<?php

use Illuminate\Database\Seeder;
// This is the new seeder class 
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [

                [
                    "name" => "Mouheb abderrahim",
                    "email" => "mouhebabderra@gmail.com",
                    "adresse" => "rue habib bourghuiba gabes",
                    "password" => "mouheb53",
                    "numtel" => "53966974",
                        "date_recrutement" => "2020-03-10",
                    "grade" => "secretaire",
                    ],
                    [
                        "name" => "Marwa mamlouk",
                        "email" => "mamloukmarwa@yahoo.fr",
                        "adresse" => "rue elfssil  ras jebel",
                        "password" => "moumou",
                        "numtel" => "93993222",
                        "date_recrutement" => "2020-03-10",
                        "grade" => "secretaire",
                        ],
            ]
           
    );
    }
}
