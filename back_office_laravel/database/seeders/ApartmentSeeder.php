<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Promotion;
use App\Models\Apartment;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

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

        $latitudes = [41.872741, 41.8422652, 41.9745014, 41.8795334, 43.8446306, 41.8408702, 41.8576651, 41.9069418, 41.8510205, 42.8795981];

        $longitudes = [12.5266453, 12.4850382, 15.5135297, 12.5415728, 12.4909213, 12.5824914, 12.5538213, 12.4915978, 12.4261153, 13.5687969];


        $user_ids = User::all()->pluck('id')->all();
        $service_ids = Service::all()->pluck('id')->all();
        $categories_ids = Category::all()->pluck('id')->all();
        $promotions_ids = Promotion::all()->pluck('id')->all();
        $promo_durations = Promotion::all()->pluck('hours', 'id')->all();

        $slug_list = [];
        $pathImg = 'uploads/apartment/img_default/';

        for ($i = 0; $i < count($addresses); $i++) {

            $title = $faker->sentence(3);
            $slug = $title;
            $n = 0;
            do {
                if (in_array($slug, $slug_list)) {
                    $n++;
                    $slug = $title . '-' . $n;
                }
            } while (in_array($slug, $slug_list));

            $slug_list[] = $slug;

            $new_apartment = new Apartment();

            $new_apartment->title = $title;
            $new_apartment->slug = Str::slug($slug);
            $new_apartment->description = $faker->sentence();
            $new_apartment->price = $faker->randomFloat(2, 1, 9999);
            $new_apartment->rooms_number = $faker->numberBetween(2, 10);
            $new_apartment->beds_number = $faker->numberBetween(1, 5);
            $new_apartment->baths_number = $faker->numberBetween(1, 3);
            $new_apartment->mtq = $faker->numberBetween(10, 1000);
            $new_apartment->address = $addresses[$i];
            $new_apartment->latitude = $latitudes[$i];
            $new_apartment->longitude = $longitudes[$i];
            $new_apartment->image = $pathImg . rand(1, 26) .'.png,'.$pathImg . rand(1, 26) .'.png,'.$pathImg . rand(1, 26) .'.png';
            $new_apartment->visible = $faker->boolean();
            $new_apartment->user_id = $faker->randomElement($user_ids);
            $new_apartment->category_id = $faker->randomElement($categories_ids);

            $new_apartment->save();

            $random_service_ids = $faker->randomElements($service_ids, null);
            $new_apartment->services()->attach($random_service_ids);

            $random_promotions_ids = $faker->randomElements($promotions_ids, null);

            $promotions_with_timestamp = [];

            foreach ($random_promotions_ids as $random_promotions_id) {
                $start_date = $faker->dateTimeThisYear();
                $hours = $promo_durations[$random_promotions_id];
                $expiration_date = (new Carbon($start_date))->addHours($hours);

                $promotions_with_timestamp[$random_promotions_id] = [
                    'start_date' => $start_date,
                    'expiration_date' => $expiration_date
                ];
            }

            $new_apartment->promotions()->attach($promotions_with_timestamp);
        };
    }
}
