<?php

namespace Database\Seeders;
use App\Models\Promotion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $promotions = [
            [
                'title'=> 'Piano 24 Ore',
                'price'=> 2.99,
                'description'=> 'Metti in evidenza il tuo appartamento sulla homepage per 24 ore',
                'hours'=> 24
            ],
            [
                'title'=> 'Piano 72 Ore',
                'price'=> 5.99,
                'description'=> 'Metti in evidenza il tuo appartamento sulla homepage per 72 ore',
                'hours'=> 72,
            ],
            [
                'title'=> 'Piano 144 Ore',
                'price'=> 9.99,
                'description'=> 'Metti in evidenza il tuo appartamento sulla homepage per 144 ore',
                'hours'=> 144
            ]
        ];

        foreach ($promotions as $promotion) {
            $new_promotion = new Promotion();
            $new_promotion->title = $promotion['title'];
            $new_promotion->price = $promotion['price'];
            $new_promotion->description = $promotion['description'];
            $new_promotion->hours = $promotion['hours'];

            $new_promotion->save();
        }
    }
}
