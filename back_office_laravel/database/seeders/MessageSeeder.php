<?php

namespace Database\Seeders;

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

        foreach($random_apartments_ids as $ids){
            $message_one = new Message();
            $message_one->name = $faker->firstName(null);
            $message_one->surname = $faker->lastName();
            $message_one->sender_email = $faker->email();
            $message_one->text = $faker->sentence(4);
            $message_one->apartment_id = $ids;
            $message_one->save();
        }


        // $ernesto = User::where('name', 'Ernesto')->where('surname', 'Casagrande')->where('email', 'ernesto@bnb.com')->first();


        // $gianfranco = User::where('name', 'Gianfranco')->where('surname', 'Luppolo')->where('email', 'gianfranco@bnb.com')->first();

        // $apartments_ids = Apartment::pluck('id')->all();

        // $ernestoApartmentId = $faker->randomElement($apartments_ids);
        // $gianfrancoApartmentId = $faker->randomElement($apartments_ids);

        // // Ensure the IDs are different
        // while ($gianfrancoApartmentId === $ernestoApartmentId) {
        //     $gianfrancoApartmentId = $faker->randomElement($apartments_ids);
        // }

        // $message_one = new Message();
        // $message_one->name = $ernesto->name;
        // $message_one->surname = $ernesto->surname;
        // $message_one->sender_email = $ernesto->email;
        // $message_one->text = $faker->sentence(4);
        // $message_one->apartment_id = $ernestoApartmentId;
        // $message_one->save();


        // $message_two = new Message();
        // $message_two->name = $gianfranco->name;
        // $message_two->surname = $gianfranco->surname;
        // $message_two->sender_email = $gianfranco->email;
        // $message_two->text = $faker->sentence(4);
        // $message_two->apartment_id = $gianfrancoApartmentId;
        // $message_two->save();

    }
}
