<?php

namespace Database\Seeders;

use App\Models\Classe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Classe::insert([
            [
                "name"=>"Salle_1",
                "description"=>"20m * 15m"

            ],
            [
                "name"=>"Salle_2",
                "description"=>"20m * 15m"

            ],
            [
                "name"=>"Salle_3",
                "description"=>"20m * 15m"

            ],
            [
                "name"=>"Salle_4",
                "description"=>"20m * 15m"

            ],
            [
                "name"=>"Salle_5",
                "description"=>"20m * 15m"

            ],
            [
                "name"=>"Salle_6",
                "description"=>"20m * 15m"

            ],
        ]

            );
    }
}