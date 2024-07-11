<?php

namespace Database\Seeders;

use App\Models\Apartment;
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

        $services = [
            'Wifi', 'Parcheggio', 'Aria Condizionata', 'Self-check-in',
            'Cucina', 'Piscina', 'Vasca Idromassaggio', 'Lavatrice', 'Riscaldamento',
            'Allarme antincendio', 'Kit di primo soccorso', 'Ascensore',
            'Colazione', 'Lavastoviglie', 'Macchina del Caffé', 'Frigorifero', 'Freezer', 'Cassaforte', 
            'Microonde', 'Fasciatoio', 'Asciugatrice', 'Balcone', 'Giardino', 
            'Palestra', 'Rilevatore di monossido di carbonio', ' Animali consentiti',
            'Area Fumatori', 'Servizi di pulizia ', 'Servizi di manutenzione', 'Ingresso privato'
        ];

        foreach ($services as $service) {
            $new_service = new Service();
            $new_service->name = $service;
            $new_service->icon = 'https://th.bing.com/th/id/OIP.o0olEd3NKcmoQL9-oyt8bAHaHa?rs=1&pid=ImgDetMain';
            $new_service->save();
        }
       
    }
}
