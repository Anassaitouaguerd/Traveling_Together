<?php

namespace App\Http\Controllers\Back_office\CRUD;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back_office\Voyages\AddVoyageRequest;
use App\Http\Requests\Back_office\Voyages\UpdateVoyageRequest;
use App\Models\Gares;
use App\Models\Voyages;
use Illuminate\Http\Request;

class VoyageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $AllVoyages = Voyages::all();
        $allGares = Gares::all();
        return view('Back-office.Voyage', compact('AllVoyages', 'allGares'));
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
    public function store(AddVoyageRequest $request)
    {
        $voyage = Voyages::create([
            'prix' => $request->prix,
            'gare_depart' => $request->gare_depart,
            'gare_arrivee' => $request->gare_arrivee
        ]);
        return back()->with('success', 'Voyage Crested successful');
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
    public function update(UpdateVoyageRequest $request, string $id)
    {
        Voyages::where('id', $id)->update($request->validated());
        return back()->with('success', 'Voyage Updated successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Voyage = Voyages::where('id', $id)->first();
        $Voyage->delete();
        return back()->with('success', 'Voyage Deleted successful');
    }
}
