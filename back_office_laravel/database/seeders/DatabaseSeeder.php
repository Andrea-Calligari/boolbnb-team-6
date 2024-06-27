<?php

namespace Database\Seeders;
 use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            ApartmentSeeder::class,
            ServiceSeeder::class,
            MessageSeeder::class,
            CategorySeeder::class,
            ViewSeeder::class,

           
        ]);
    }
}
