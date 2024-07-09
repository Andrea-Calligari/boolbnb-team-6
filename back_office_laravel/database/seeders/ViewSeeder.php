<?php

namespace Database\Seeders;

use App\Models\Apartment;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\View;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $apartments_ids = Apartment::pluck('id')->all();

        for ($i = 0; $i < 10000; $i++) {
            $view = new View();
            $view->apartment_id = $faker->randomElement($apartments_ids);
            $view->ip_address = $faker->ipv4();
            $view->viewed_at = $faker->dateTimeThisYear();
            $view->save();
        }
    }
}
