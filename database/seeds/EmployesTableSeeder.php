<?php

use Illuminate\Database\Seeder;

class EmployesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        DB::table('employes')->insert(
            [
                [
                    "user_id" => 1,
                    "etat" => "congé",
                    "solde" => 5,
                    "profession" => "agent administratif"
                ],
                [
                    "user_id" => 2,
                    "etat" => "travail",
                    "solde" => 5,
                    "profession" => "Secretaire"
                ],
                
            ]
            );
    }
}
