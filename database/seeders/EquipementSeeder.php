<?php

namespace Database\Seeders;

use App\Models\Equipement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Equipement::insert([
            [
                "name"=>"Boitier – 1 Caméra Panasonic Lumix DC-GH5 Mirrorless Micro Four Thirds . ",
                "state"=>true,
                "stock"=>2,
                'img_url' => "Equipement1.jpg", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> "DC-GH5KBODY",
            ],

            [
                "name"=>"MEDIUM 12-35mm (O58mm) Caméra Panasonic Lumix G X Vario 12-35mm f/2.8 II ASPH. POWER O.I.S",
                "state"=>true,
                "stock"=>1,
                'img_url' => "Equipment2.png", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> " H-HSA12035 ou modèle équivalent",
            ],

            [
                "name"=>"CLOSE-UP 35-100mm (O58 mm) Caméra Panasonic Lumix G X Vario 35-100mm f/2.8 II POWER O.I.S.",
                "state"=>true,
                "stock"=>1,
                'img_url' => "Equipment3.png", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> "H-HSA35100 ou modèle équivalent",
            ],

            [
                "name"=>"SanDisk 64GB Extreme PRO UHS-II SDXC Memory Card.",
                "state"=>true,
                "stock"=>5,
                'img_url' => "Equipment4.jpg", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> "SDSDXPK-064G-ANCIN",
            ],
            [
                "name"=>"Trépied Caméra Studio.",
                "state"=>true,
                "stock"=>2,
                'img_url' => "Equipment5.jpg", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> "Manfrotto 504HD",
            ],
            [
                "name"=>"Lecteur de cart Lexar Professional USB 3.0",
                "state"=>true,
                "stock"=>1,
                'img_url' => "Equipment6.jpg", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> "Dual-Slot Reader (UDMA 7)",
            ],
            [
                "name"=>"Panasonic DMW-BLF19 Rechargeable.",
                "state"=>true,
                "stock"=>2,
                'img_url' => "Equipment7.jpg", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> "Lithium-ion Battery Pack (7.2V, 1860mAh)",
            ],
            [
                "name"=>"Stabilisateur Mobile",
                "state"=>true,
                "stock"=>1,
                'img_url' => "Equipment8.png", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> "Aucune",
            ],
            [
                "name"=>"Boitier – 1 DJI Stabilisateur 3 axes pour smartphones.",
                "state"=>true,
                "stock"=>2,
                'img_url' => "Equipment9.jpg", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> "DC-GH5KBODY",
            ],
            [
                "name"=>"Caméra portable DJI Pocket",
                "state"=>true,
                "stock"=>1,
                'img_url' => "Equipment10.jpg", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> "H-HSA35100 ou modèle équivalent",
            ],
            [
                "name"=>"Microcravate Rode + une rallonge. ",
                "state"=>true,
                "stock"=>2,
                'img_url' => "Equipment11.jpg", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> "Aucune",
            ],

            [
                "name"=>"Adapteur Lignthing JACK",
                "state"=>true,
                "stock"=>2,
                'img_url' => "Equipment12.png", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> "Aucune",
            ],

            [
                "name"=>"Caméra Photo Vidéo Eclairage Kit",
                "state"=>true,
                "stock"=>1,
                'img_url' => "Equipment13.jpg", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> "Aucune",
            ],
            [
                "name"=>"Zoom H6 Handy Recorder with Interchangeable Microphone System",
                "state"=>true,
                "stock"=>1,
                'img_url' => "Equipment14.jpg", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> "Aucune",
            ],

            [
                "name"=>"Micro-Cravate SENNHEISER Portable sans fil G4",
                "state"=>true,
                "stock"=>4,
                'img_url' => "Equipment15.jpg", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> "EW 112P G4-B (626 - 668 MHz)",
            ],

            [
                "name"=>"Audio-Technica Casque de monitoring fermé dynamique.",
                "state"=>true,
                "stock"=>4,
                'img_url' => "Equipment16.png", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> "ATH-M20X",
            ],
            [
                "name"=>"Audio-Technica Microphone - Microphone à condensateur à directivité variable",
                "state"=>true,
                "stock"=>4,
                'img_url' => "Equipment17.jpg", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> " AT2050",
            ],
            [
                "name"=>"Bras Pied de micro Bureau Suspension Boom Mic cisaillement Bras avec table Clip Microphone Support de montage Filtre anti-bruit Kit Noir Pare-brise",
                "state"=>true,
                "stock"=>4,
                'img_url' => "Equipment18.jpg", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> "Aucune",
            ],
            [
                "name"=>"Carte micro Kingston SDCX10/64GB",
                "state"=>true,
                "stock"=>4,
                'img_url' => "Equipment19.jpg", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> "Aucune",
            ],
            [
                "name"=>"NANGUANG LED Lumière Studio Kit.",
                "state"=>true,
                "stock"=>1,
                'img_url' => "Equipment20.jpg", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> "NANGUANG CN-30F+CN-600SA Studio",
            ],
            [
                "name"=>"Savage Widetone Seamless Background Paper (#75 True green, m 3,500 x  m 2,7)",
                "state"=>true,
                "stock"=>1,
                'img_url' => "Equipment21.jpg", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> "Aucune",
            ],
            [
                "name"=>"Savage Widetone Seamless Background Paper (#70 Storm White, m 3,500 x  m 2,7)",
                "state"=>true,
                "stock"=>1,
                'img_url' => "Equipment22.jpg", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> "Aucune",
            ],
            [
                "name"=>"Savage Widetone Seamless Background Paper (#43 Marmalade, m 3,500 x  m 2,7)",
                "state"=>true,
                "stock"=>1,
                'img_url' => "Equipment23.jpg", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> "Aucune",
            ],
            [
                "name"=>"Savage Widetone Seamless Background Paper (#29 Orchid, m 3,500 x  m 2,7)",
                "state"=>true,
                "stock"=>1,
                'img_url' => "Equipment24.jpg", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> "NANGUANG CN-30F+CN-600SA Studio",
            ],
            [
                "name"=>"Background Holder ",
                "state"=>true,
                "stock"=>1,
                'img_url' => "Equipment25.jpg", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> "Aucune",
            ],
            [
                "name"=>"BLACKMAGIC DESIGN ATEM MINI Pro – Mélangeur",
                "state"=>true,
                "stock"=>1,
                'img_url' => "Equipment26.jpg", // Exemple : générer une URL d'image de chat de 640x480 pixels
                "ref"=> "Aucune",
            ],

        ]
        );
    }
}