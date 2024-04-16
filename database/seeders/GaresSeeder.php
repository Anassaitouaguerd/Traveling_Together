<?php

namespace Database\Seeders;

use App\Models\Gares;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GaresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
            'Casablanca',
            'El Jadida',
            'Rabat',
            'Tangier',
            'Marrakech',
            'Meknes',
            'Fes',
            'Kenitra',
            'Khouribga',
            'Settat',
            'Oujda',
            'Tetouan',
            'Sale',
            'Nador',
            'Safi',
            'Mohammedia',
            'Taza',
            'Taroudant',
            'Youssoufia',
            'Berrechid',
            'Casablanca Port',
            'Ain Sebaa',
            'Bernoussi',
            'Bouskoura',
            'Casa Voyageurs',
            'Casa Port',
            'Tantan',
            'Guelmim',
            'Benguerir',
            'Sidi Kacem',
            'Ksar El Kebir',
            'Chefchaouen',
            'EL Khemisset'
        ];
        foreach ($regions as $region) {
            $Gare = new Gares();
            $Gare->name = $region;
            $Gare->save();
        }
    }
}
