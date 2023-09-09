<?php

namespace Database\Seeders;

use App\Models\Studio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Studio::insert(
            [
                [
                    "name"=>"Studio_1",
                    "description"=>"20m * 15m"
                ],
                [
                    "name"=>"Studio_2",
                    "description"=>"20m * 15m"

                ],
                [
                    "name"=>"Espace_cafe",
                    "description"=>"20m * 15m"

                ],
                [
                    "name"=>"Espace_Agora",
                    "description"=>"20m * 15m"

                ],
                [
                    "name"=>"Co_working",
                    "description"=>"20m * 15m"

                ],
                [
                    "name"=>"Externe",
                    "description"=>"20m * 15m"
                ],
            ]

            );
    }
}
