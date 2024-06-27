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
        $ernesto_name = User::where('name', 'Ernesto')->first();
        $ernesto_surname = User::where('surname', 'Casagrande')->first();
        $ernesto_email = User::where('email', 'ernesto@bnb.com')->first();

        $gianfranco_name = User::where('name', 'Gianfranco')->first();
        $gianfranco_surname = User::where('surname', 'Luppolo')->first();
        $gianfranco_email = User::where('email', 'gianfranco@bnb.com')->first();

        $message_one = new Message();
        $message_one->name = $ernesto_name;
        $message_one->surname = $ernesto_surname;
        $message_one->email = $ernesto_email;
        $message_one->text = $faker->words();
        $message_one->save();
        

        $message_two = new Message();
        $message_two->name = $gianfranco_name;
        $message_two->surname = $gianfranco_surname;
        $message_two->email = $gianfranco_email;

        $message_two->save();

    }
}
