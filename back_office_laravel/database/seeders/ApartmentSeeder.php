<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Apartment;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;


class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $addresses = [
            'Via Turno 34, Roma Capitale, 00181, Lazio, Italia', 
            'Via Benedetto Croce 79, Roma Capitale, 00142, Lazio, Italia',
            'Via Radicofani 172, Roma Capitale, 00138, Lazio, Italia',
            'Via Galeazzo Alessi 261, Torpignattara, Roma Capitale, 00176, Lazio, Italia',
            'Via di Grotta Perfetta 360, Roma Capitale, 00142, Lazio, Italia',
            'Via Mormanno 38, Roma Capitale, 00173, Lazio, Italia',
            'Via del Quadraro 25A, Roma Capitale, 00174, Lazio, Italia',
            'Via Vittorio Veneto 119/a, Roma Capitale, 00187, Lazio, Italia',
            'Via Portuense 747a, Roma Capitale, 00148, Lazio, Italia',
            'Via dei Glicini 107, Roma Capitale, 00172, Lazio, Italia'
        ];

        $latitudes = [41.872741, 41.8422652, 41.9745014, 41.8795334, 41.8446306, 41.8408702, 41.8576651, 41.9069418, 41.8510205, 41.8795981];

        $longitudes = [12.5266453, 12.4850382, 12.5135297, 12.5415728, 12.4909213, 12.5824914, 12.5538213, 12.4915978, 12.4261153, 12.5687969];

        for($i = 0; $i < count($addresses); $i++){

            $new_apartment = new Apartment();

            $new_apartment->title = $faker->sentence(5);
            $new_apartment->slug = Str::slug($title);
            $new_apartment->description = $faker->sentence();
            $new_apartment->price = $faker->randomFloat(2, 1, 9999);
            $new_apartment->rooms_number = $faker->numberBetween(2, 10);
            $new_apartment->beds_number = $faker->numberBetween(1, 5);
            $new_apartment->baths_number = $faker->numberBetween(1, 3);
            $new_apartment->mtq = $faker->numberBetween(10, 1000);
            $new_apartment->address = $addresses[$i];
            $new_apartment->latitute = $latitudes[$i];
            $new_apartment->longitude = $longitudes[$i];
            $new_apartment->image = 'https://picsum.photos/200/300';
            $new_apartment->visible = $faker->boolean();

            $new_apartment->save();
        };
    }
}
