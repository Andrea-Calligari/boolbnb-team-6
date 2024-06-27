<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

use Faker\Generator as Faker;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $service = new Service();
        $service->name = $faker->name();
        $service->icon = 'https://th.bing.com/th/id/OIP.o0olEd3NKcmoQL9-oyt8bAHaHa?rs=1&pid=ImgDetMain';
        $service->save();
    }
}
