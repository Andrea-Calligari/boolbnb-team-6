<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {   
        for($i = 0 ; $i < 7; $i++){

        $category = new Category();
        $category->name = $faker->name();
        $category->description = $faker->paragraph();
        
        $category->save();
        }
    }
}
