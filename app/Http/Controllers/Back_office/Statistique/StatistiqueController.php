<?php

namespace App\Http\Controllers\Back_office\Statistique;

use App\Http\Controllers\Controller;
use App\Models\Gares;
use App\Models\Reservations;
use App\Models\Trains;
use App\Models\Voyages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistiqueController extends Controller
{
    public function index()
    {
        $reservations = $this->allReservations();
        $trains = $this->allTrains();
        $gares = $this->allGares();
        $voyages = $this->allVoyages();
        return view('Back-office.dashboard', compact('reservations', 'trains', 'gares', 'voyages'));
    }
    public function allReservations()
    {
        $reservations = Reservations::all()->count();
        return $reservations;
    }
    public function allTrains()
    {
        $trains = Trains::all()->count();
        return $trains;
    }
    public function allGares()
    {
        $gares = Gares::all()->count();
        return $gares;
    }
    public function allVoyages()
    {
        $voyages = Voyages::all()->count();
        return $voyages;
    }
}