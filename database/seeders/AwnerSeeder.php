<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([ 
            'name' => 'Awner 1',
            'email' => 'Awner1@gmail.com',
            'email_verified_at' => now(),
            'password' => 'password',
            ])->assignRole('Awner');
    }
}
