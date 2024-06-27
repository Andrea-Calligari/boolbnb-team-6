<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\View;
class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   $view = new View();
        $view->ip_address = '192.168.0.1';
        $view->save();
    }
}
