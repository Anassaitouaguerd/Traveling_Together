<?php

namespace App\Http\Controllers\Back_office\CRUD;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back_office\Trains\AddTrainRequest;
use App\Http\Requests\Back_office\Trains\UpdateTrainRequest;
use App\Models\Gares;
use App\Models\Trains;
use App\Models\Voyages;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trains = Trains::all();
        $voyages = Voyages::all();
        $gares = Gares::all();
        return view('Back-office.Trains', compact('trains', 'voyages', 'gares'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddTrainRequest $request)
    {
        Trains::create([
            'name' => $request->name,
            'voyage_id' => $request->voyage_id,
            'gare_id' => $request->gare_id,
        ]);
        return back()->with('success', 'Add Train with success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainRequest $request, string $id)
    {
        Trains::where('id', $id)->update($request->validated());
        return back()->with('success', 'Update Train with success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $train = Trains::where('id', $id)->first();
        $train->delete();
        return back()->with('success', 'Delete Train with success');
    }
}
