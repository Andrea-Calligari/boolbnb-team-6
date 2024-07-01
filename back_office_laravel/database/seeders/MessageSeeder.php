<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Message;
use App\Models\Apartment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $apartments_ids = Apartment::pluck('id')->all();

        $random_apartments_ids = $faker->randomElements($apartments_ids, null);

        $slug_list = [];

        foreach($random_apartments_ids as $ids){

            $name = $faker->firstName(null);
            $slug = $name;
            $n = 0;
            do {
                if (in_array($slug, $slug_list)) {
                    $n++;
                    $slug = $name . '-' . $n;
                }
            } while (in_array($slug, $slug_list));

            $slug_list[] = $slug;

            $message_one = new Message();
            $message_one->name = $name;
            $message_one->surname = $faker->lastName();
            $message_one->sender_email = $faker->email();
            $message_one->text = $faker->sentence(4);
            $message_one->slug = Str::slug($slug);
            $message_one->apartment_id = $ids;
            $message_one->save();
        }


        
    }
}
