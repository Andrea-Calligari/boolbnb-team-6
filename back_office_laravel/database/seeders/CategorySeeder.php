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
            'Casa',
            'Casetta',
            'Villa',
            'Villetta',
            'Casa Indipendente',
            'Casa Semi-indipendente',
            'Casa/villetta A Schiera',
            'Casa Unifamiliare',
            'Appartamento',
            'Attico',
            'Fattoria',
            'Cascina',
            'Masseria',
            'Casale',
            'Baita',
            'Palazzo',
            'Palazzina',
            'Condominio',
            'Grattacielo',
            'Castello',
            'Trullo',
            'Capanna',
            'Tenda',
            'Iglù/igloo',
            'Camper',
            'Roulotte'
        ];
        foreach($categories as $category){

            $new_category = new Category();
            $new_category->name = $category;
            $new_category->description = $faker->paragraph();

            $new_category->save();
        }
    }
}
