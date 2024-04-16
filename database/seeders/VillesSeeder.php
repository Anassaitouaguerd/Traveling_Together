<?php

namespace Database\Seeders;

use App\Models\Villes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VillesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $villes = [
            'Casablanca',
            'Rabat',
            'Marrakech',
            'Fes',
            'Tangier',
            'Agadir',
            'Meknes',
            'Oujda',
            'Kenitra',
            'Tetouan',
            'Safi',
            'Mohammedia',
            'Beni Mellal',
            'El Jadida',
            'Taza',
            'Nador',
            'Settat',
            'Khouribga',
            'Berkane',
            'Tanger-Tétouan-Al Hoceima',
            'Souss-Massa',
            'Guelmim-Oued Noun',
            'Dakhla-Oued Ed-Dahab',
            'Laayoune-Sakia El Hamra',
            'Errachidia',
            'Al Hoceima',
            'Khenifra',
            'Taroudant',
            'Essaouira',
            'Chefchaouen',
            'Agadir-Ida Ou Tanane',
            'Skhirat-Témara',
            'Khémisset',
            'Taourirt',
            'Sidi Kacem',
            'Ouezzane',
            'El Kelaa des Sraghna',
            'Azilal',
            'Sidi Slimane',
            'Sefrou',
            'Youssoufia',
            'Tan-Tan',
            'Ouarzazate',
            'Guercif',
            'Oujda-Angad',
            'Sidi Ifni',
            'Zagora',
            'Boujdour',
            'Tata',
            'Jerada',
            'Oued Ed-Dahab',
            'Tarfaya',
            'Tinghir',
            'Sidi Bennour',
            'Midelt',
            'Imzouren',
            'Driouch',
            'Oulad Teima',
            'Sefrou',
            'Martil',
            'Azrou',
            'Skoura',
            'Bouznika',
            'Missour',
            'Ouazzane',
            'Boumalne Dades',
            'Goulmima',
            'Had Kourt',
            'Al Hoceima',
            'Zaio',
            'Kasba Tadla',
            'Taounate',
            'Sidi Bennour',
            'Ouazzane',
            'Ifrane',
            'Asilah',
            'Ksar El Kebir',
            'Bouznika',
            'Smara',
            'Tan-Tan',
            'Dakhla',
            'Skhirate',
            'Sidi Ifni',
            'Tiznit',
            'Oued Zem',
            'Khouribga',
            'Guercif',
            'Skhirat',
            'Berkane',
            'Sidi Yahya El Gharb',
            'Mohammedia',
            'Guelmim',
            'Sidi Bennour',
            'Berkane',
            'Settat',
            'Bouznika',
            'Boujad',
            'Skhirate',
            'El Hajeb',
            'Oulad Ayad'
        ];
        foreach ($villes as $ville) {
            $City = new Villes();
            $City->name = $ville;
            $City->save();
        }
    }
}
