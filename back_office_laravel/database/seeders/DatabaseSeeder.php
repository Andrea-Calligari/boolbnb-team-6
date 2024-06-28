<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Laravel\Prompts\password;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            CategorySeeder::class,
            UserSeeder::class,
            PromotionSeeder::class,
            ServiceSeeder::class,
            ApartmentSeeder::class,
            ViewSeeder::class,
            MessageSeeder::class
        ]);
        $this->call([
            CategorySeeder::class,
            UserSeeder::class,
            PromotionSeeder::class,
            ServiceSeeder::class,
            ApartmentSeeder::class,
            ViewSeeder::class,
            MessageSeeder::class
        ]);
    }
}
