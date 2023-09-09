<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "admin",
            "lastname" => 'bouzidi',
            "cin" => 'bk556699',
            "gender" => 'homme',
            "phone" => '0622551519',
            "type" => 'interne',
            "history" => 0,
            'email' => "admin@admin.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'verification'=> 1
        ])->assignRole('admin');
        User::create([
            'name' => "user",
            "lastname" => 'user',
            "cin" => 'bk556699',
            "gender" => 'homme',
            "phone" => '0622551519',
            "type" => 'interne',
            "history" => 0,
            'email' => "user@user.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'verification' => 0
        ])->assignRole('G.C');
    }
}
