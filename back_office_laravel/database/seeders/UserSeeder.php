<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create({
            'name' => 'Ernesto',
            'surnamename' => 'Casagrande',
            'email' => 'ernesto@bnb.com',
            // 'city' => 'rome'
            'password' => Hash::make('admin'),
        });
        
        User::create({
            'name' => 'Gianfranco',
            'surname' => 'Luppolo',
            // 'city' => 'rome'
            'email' => 'gianfranco@bnb.com',
            'password' => Hash::make('admin'),
        });
    }
}
