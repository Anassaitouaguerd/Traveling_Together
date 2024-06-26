<?php

namespace App\Http\Controllers\Front_office\Reservations;

use App\Http\Controllers\Controller;
use App\Models\Reservations;
use App\Models\Trains;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function default_place($Ordered_Places)
    {
        $place_in_train = 100;

        if (count($Ordered_Places) >= $place_in_train) {
            return false;
        } else {
            $final_place = 0;
            for ($i = 1; $i <= $place_in_train; $i++) {
                if (!in_array($i, $Ordered_Places)) {
                    $final_place = $i;
                    break;
                }
            }
            return $final_place;
        }
    }
    public function index($id)
    {
        $train = Trains::where('id', $id)->first();
        $Ordered_Places = Reservations::where('voyage_id', $train->voyage->id)->orderBy('place')->pluck('place')->toArray();
        $default_place = $this->default_place($Ordered_Places);
        return view('Front-office.Reservations.reservation', compact('train', 'default_place', 'Ordered_Places'));
    }
    public function resrvation(Request $request)
    {
        $train = Trains::where('id', $request->idTrain)->first();
        $Ordered_Places = Reservations::where('voyage_id', $train->voyage->id)->pluck('place')->toArray();

        if (in_array($request->selectedSeats, $Ordered_Places)) {
            return back()->with("error", "this place is reserved after");
        }
        $date_now = now();
        $user_id = session("user_id");
        $voyage_id = $train->voyage->id;
        $token = uniqid();
        $reservation = Reservations::create([
            'date_reservation' => $date_now,
            'user_id' => $user_id,
            'voyage_id' => $voyage_id,
            'token_id' => $token,
            'place' => $request->selectedSeats,
        ]);
        $reservation_id = $reservation->id;
        return response()->json($reservation_id, 200);
    }
    public function ticketPage($reservation_id)
    {
        $reservation = Reservations::where('id', $reservation_id)->first();
        return view("Front-office.Reservations.Ticket", compact('reservation'));
    }
}