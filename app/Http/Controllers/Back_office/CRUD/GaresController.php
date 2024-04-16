<?php

namespace App\Http\Controllers\Back_office\CRUD;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back_office\Gares\AddGaresRequest;
use App\Http\Requests\Back_office\Gares\UpdateGaresRequest;
use App\Models\Gares;
use App\Models\Villes;
use Illuminate\Http\Request;

class GaresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gares = Gares::all();
        $villes = Villes::all();
        return view('Back-office.Gares', compact('gares', 'villes'));
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
    public function store(AddGaresRequest $request)
    {
        Gares::create($request->validated());
        return back()->with('success', 'Add gare with successful');
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
    public function update(UpdateGaresRequest $request, string $id)
    {
        Gares::where('id', $id)->update($request->validated());
        return back()->with('success', 'Update gare with successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gares::where('id', $id)->delete();
        return back()->with('success', 'Delete gare with successful');
    }
}