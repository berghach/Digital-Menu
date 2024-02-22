<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OperatuerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([ 
            'name' => 'Operatuer 1',
            'email' => 'Operatuer1@gmail.com',
            'email_verified_at' => now(),
            'password' => 'password',
            ])->assignRole('Operatuer');
    }
}
