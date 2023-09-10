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
                "name"=>"Salle 1",
                "description"=>"20m * 15m"

            ],
            [
                "name"=>"Salle 2",
                "description"=>"20m * 15m"

            ],
            [
                "name"=>"Salle 3",
                "description"=>"20m * 15m"

            ],
            [
                "name"=>"Salle 4",
                "description"=>"20m * 15m"

            ],
            [
                "name"=>"Salle 5",
                "description"=>"20m * 15m"

            ],
            [
                "name"=>"Salle 6",
                "description"=>"20m * 15m"

            ],
        ]

            );
    }
}