<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Ratu',
            'email' => 'ratunaira098@gmail.com',
            'password' => Hash::make('102042300130'),
        ]);

        User::create([
            'name' => 'Levi Raica',
            'email' => 'leviraica@gmail.com',
            'password' => Hash::make('240605'),
        ]);

        User::create([
            'name' => 'Oryza',
            'email' => 'oryzasativa@gmail.com',
            'password' => Hash::make('102042300121'),
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123'),
        ]);
    }
}