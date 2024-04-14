<?php

namespace App\Http\Controllers\Front_office;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front_office\FindTrainsRequest;
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
        dd($request);
    }
}
