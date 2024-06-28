<?php

namespace Database\Seeders;
use Faker\Generator as Faker;
use App\Models\Message;
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
        $ernesto = User::where('name', 'Ernesto')->where('surname','Casagrande')->where('email', 'ernesto@bnb.com')->first();
      

        $gianfranco = User::where('name', 'Gianfranco')->where('surname','Luppolo')->where('email', 'gianfranco@bnb.com')->first();
        

        $message_one = new Message();
        $message_one->name = $ernesto->name;
        $message_one->surname = $ernesto->surname;
        $message_one->sender_email = $ernesto->email;
        $message_one->text = $faker->sentence(4);
        $message_one->save();
        

        $message_two = new Message();
        $message_two->name = $gianfranco->name;
        $message_two->surname = $gianfranco->surname;
        $message_two->sender_email = $gianfranco->email;
        $message_two->text = $faker->sentence(4);


        $message_two->save();

    }
}
