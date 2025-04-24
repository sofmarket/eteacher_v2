<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            [
                'name' => 'Settat',
                'lat' => 33.0126,
                'long' => -7.6111,
            ],
            // all cities in Morocco
            [
                'name' => 'Casablanca',
                'lat' => 33.5928,
                'long' => -7.5479,
            ],
            [
                'name' => 'Rabat',
                'lat' => 34.0133,
                'long' => -6.8325,
            ],
            [
                'name' => 'Fes',
                'lat' => 34.0204,
                'long' => -4.9920,
            ],
            [
                'name' => 'Marrakech',
                'lat' => 31.6339,
                'long' => -8.0061,
            ],
            [
                'name' => 'Tangier',
                'lat' => 34.2000,
                'long' => -2.6000,
            ],
            [
                'name' => 'Agadir',
                'lat' => 30.4213,
                'long' => -9.6114,
            ],
            [
                'name' => 'Ouarzazate',
                'lat' => 30.9285,
                'long' => -6.9219,
            ],
            [
                'name' => 'El Kelaa M\'Gouna',  
                'lat' => 30.1219,       
                'long' => -5.9165,
            ],
            [
                'name' => 'Essaouira',
                'lat' => 31.5167,
                'long' => -9.7667,  
            ],
            [
                'name' => 'Ifrane',
                'lat' => 34.8133,
                'long' => -5.1000,
            ],
            [
                'name' => 'Taza',
                'lat' => 34.2000,
                'long' => -4.0000,
            ],
            [
                'name' => 'Kenitra',
                'lat' => 34.2333,
                'long' => -6.5833,
            ],
            [
                'name' => 'Nador',
                'lat' => 35.1667,
                'long' => -2.9333,
            ],
            [
                'name' => 'Oujda',
                'lat' => 34.6900,
                'long' => -1.9100,
            ],
            [
                'name' => 'Safi',
                'lat' => 32.2967,
                'long' => -9.2267,
            ],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
} 