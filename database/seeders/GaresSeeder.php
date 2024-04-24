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
        $ville_id = [
            '1',
            '14',
            '2',
            '5',
            '3',
            '7',
            '4',
            '9',
            '18',
            '95',
            '8',
            '10',
            NULL,
            '16',
            '11',
            '12',
            '15',
            '28',
            '41',
            NULL,
            '1',
            '1',
            '1',
            NULL,
            '1',
            '1',
            '42',
            '92',
            NULL,
            NULL,
            '20',
            '10',
            '2',
        ];
        foreach ($regions as $key => $region) {
            $gare = new Gares();
            $gare->name = $region;
            $gare->ville_id = $ville_id[$key];
            $gare->save();
        }
    }
}
