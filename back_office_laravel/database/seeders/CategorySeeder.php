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
        $categories = [
            'Villa',
            'Villetta',
            'Casa Indipendente',
            'Casa Semi-indipendente',
            'Casa/villetta A Schiera',
            'Monolocale',
            'Bilocale',
            'Trilocale',
            'Attico',
            'Palazzina'
        ];
        foreach($categories as $category){

            $new_category = new Category();
            $new_category->name = $category;
            $new_category->description = $faker->paragraph();

            $new_category->save();
        }
    }
}
