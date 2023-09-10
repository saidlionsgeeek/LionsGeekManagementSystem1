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
                    "name"=>"Studio 1",
                    "description"=>"20m * 15m"
                ],
                [
                    "name"=>"Studio 2",
                    "description"=>"20m * 15m"

                ],
                [
                    "name"=>"Espace cafe",
                    "description"=>"20m * 15m"

                ],
                [
                    "name"=>"Espace Agora",
                    "description"=>"20m * 15m"

                ],
                [
                    "name"=>"Co-working",
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
