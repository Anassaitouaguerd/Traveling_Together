<?php

namespace App\Http\Controllers\Front_office;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front_office\FindTrainsRequest;
use App\Models\Gares;
use App\Models\Trains;
use App\Models\Voyages;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $jeson = file_get_contents(storage_path('app/Citys.json'));
        $data = json_decode(file_get_contents("php://input"));
        $jsonData = json_decode($jeson);
        $cach = $jsonData->cities->data;
        $AllGareDepart = [];
        $AllGareDistination = [];
        foreach ($cach as $city) {
            if (stripos($city->names->en, $data->gare_depart) !== false) {
                $AllGareDepart[] = $city;
            }
            if (stripos($city->names->en, $data->gare_distination) !== false) {
                $AllGareDistination[] = $city;
            }
        }
        echo json_encode([$AllGareDepart, $AllGareDistination]);
    }

    public function FindTrains(FindTrainsRequest $request)
    {
        $point_depart = $request->gare_depart;
        $point_distination = $request->gare_distination;

        $gare_depart = Gares::where('name', $point_depart)->first();
        $gare_distination = Gares::where('name', $point_distination)->first();
        $voyage = Voyages::where('gare_depart', $gare_depart->id)
            ->where('gare_arrivee', $gare_distination->id)
            ->get();

        $trainIds = $voyage->pluck('id');

        $trains = Trains::whereIn('voyage_id', $trainIds)->get();

        return view('Front-office.Reservations.trains', compact('voyage', 'trains', 'point_depart', 'point_distination'));
    }
}
