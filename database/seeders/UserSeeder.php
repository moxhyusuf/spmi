<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama' => 'PIC',
            'username' => 'pic',
            'password' => Hash::make('123456'),
            'role' => 'pic'
        ]);

        User::create([
            'nama' => 'PPM',
            'username' => 'ppm',
            'password' => Hash::make('123456'),
            'role' => 'ppm'
        ]);

        User::create([
            'nama' => 'Direktur',
            'username' => 'direktur',
            'password' => Hash::make('123456'),
            'role' => 'direktur'
        ]);
    }
}
