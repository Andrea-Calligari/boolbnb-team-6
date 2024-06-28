<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        User::create([
            'name' => 'Franco',
            'surname' => 'Gioia',
            'email' => 'test@example.com',
            'password' => 'password',
            'admin' => true
        ]);

        User::create([
            'name' => 'Ernesto',
            'surname' => 'Casagrande',
            'email' => 'ernesto@bnb.com',
            //  'city' => 'rome',
            'password' => Hash::make('admin'),
        ]);

        User::create([
            'name' => 'Gianfranco',
            'surname' => 'Luppolo',
            //  'city' => 'rome',
            'email' => 'gianfranco@bnb.com',
            'password' => Hash::make('admin'),
        ]);

        for ($i = 0; $i < 5; $i++) {
            User::create([
                'name' => $faker->firstName(null),
                'surname' => $faker->lastName(),
                //  'city' => 'rome',
                'email' => $faker->email(),
                'password' => Hash::make('admin'),
            ]);
        }
    }
}
