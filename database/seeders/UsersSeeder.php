<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'firtName' => 'Rayllan',
            'lastName' => 'Christian',
            'email' => 'rayllan@teste.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
