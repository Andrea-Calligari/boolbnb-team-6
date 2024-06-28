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
        $services = [ 
            'Wifi', 'Parcheggio', 'Aria Condizionata', 'carta Igienica', 'Shampoo', 'Self-check-in', 
            'Cucina', 'Piscina', 'Vasca Idromassaggio', 'Lavatrice', 'Tv', 'Riscaldamento',
            'Allarme antincendio', 'Camino', 'Kit di primo soccorso', 'Ascensore', 
            'Colazione', 'Lavastoviglie', 'Macchina del Caffe', 'Frigorifero', 'Freezer',
            'Tostapane', 'Cassaforte','Porta Blindata', 'Microonde', 'Giochi da tavolo', 'Fasciatoio', 
            'Asciugacapelli','Asciugatrice',"Balcone", 'Giardino', 'Palestra', 'Barbeque', 'Rilevatore di monossido di carbonio', 'Scrivania',
            'Stampante', ' Animali consentiti', 'Area Fumatori', 'Cuccia', 'Servizi di pulizia ','Servizi di manutenzione', 'Ingresso privato'
        ];

        foreach($services as $service){
            $service = new Service();
            $service->name = $service;
            $service->icon = 'https://th.bing.com/th/id/OIP.o0olEd3NKcmoQL9-oyt8bAHaHa?rs=1&pid=ImgDetMain';
            $service->save();

        }
    }
}
