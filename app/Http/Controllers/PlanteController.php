<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plantes = Plante::all(); // Retrieve all Plante records
        return view('plantes.index', compact('plantes')); // Return to the index view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plantes.create'); // Return the form view for creating a new plante
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'besoins' => 'required|string',
            'jardin_id' => 'required|exists:jardins,id',
        ]);

        Plante::create($request->all()); // Create a new Plante instance
        return redirect()->route('plantes.index')->with('success', 'Plante created successfully.'); // Redirect with a success message
    }

    /**
     * Display the specified resource.
     *
     * @param  Plante  $plante
     * @return \Illuminate\Http\Response
     */
    public function show(Plante $plante)
    {
        return view('plantes.show', compact('plante')); // Return the show view for a specific plante
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Plante  $plante
     * @return \Illuminate\Http\Response
     */
    public function edit(Plante $plante)
    {
        return view('plantes.edit', compact('plante')); // Return the form view for editing a specific plante
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Plante  $plante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plante $plante)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'besoins' => 'required|string',
            'jardin_id' => 'required|exists:jardins,id',
        ]);

        $plante->update($request->all()); // Update the Plante instance
        return redirect()->route('plantes.index')->with('success', 'Plante updated successfully.'); // Redirect with a success message
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Plante  $plante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plante $plante)
    {
        $plante->delete(); // Delete the Plante instance
        return redirect()->route('plantes.index')->with('success', 'Plante deleted successfully.'); // Redirect with a success message
    }
}
