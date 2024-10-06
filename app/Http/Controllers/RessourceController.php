<?php

namespace App\Http\Controllers;

use App\Models\Ressource;
use Illuminate\Http\Request;

class RessourceController extends Controller
{
    /**
     * Display a listing of the ressources.
     */
    public function index()
    {
        $ressources = Ressource::all();
        return view('Front.Ressource.index', compact('ressources'));
    }

    /**
     * Show the form for creating a new ressource.
     */
    public function create()
    {
        return view('Front.Ressource.create');
    }

    /**
     * Store a newly created ressource in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'type' => 'required|string',
            'disponibilité' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            // 'user_id' => 'required|exists:users,id',

        ]);
        //hard coding user for now
        $data = $request->all();
        $data['user_id'] = 1;

        // Check if type and disponibilité are valid
        if (!Ressource::isValidType($request->type)) {
            return redirect()->back()->withErrors(['type' => 'Invalid type selected.']);
        }
        if (!Ressource::isValidDisponibilite($request->disponibilité)) {
            return redirect()->back()->withErrors(['disponibilité' => 'Invalid availability selected.']);
        }

        // Ressource::create($request->all());
        Ressource::create($data);

        return redirect()->route('ressource.index')->with('success', 'Ressource created successfully.');
    }

    /**
     * Display the specified ressource.
     */
    public function show(Ressource $ressource)
    {
        return view('Front.Ressource.show', compact('ressource'));
    }

    /**
     * Show the form for editing the specified ressource.
     */
    public function edit(Ressource $ressource)
    {
        return view('Front.Ressource.edit', compact('ressource'));
    }

    /**
     * Update the specified ressource in the database.
     */
    public function update(Request $request, Ressource $ressource)
    {

        $request->validate([
            'titre' => 'required|string',
            'type' => 'required|string',
            'disponibilité' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
        ]);


        if (!Ressource::isValidType($request->type)) {
            return redirect()->back()->withErrors(['type' => 'Invalid type selected.']);
        }

        if (!Ressource::isValidDisponibilite($request->disponibilité)) {
            return redirect()->back()->withErrors(['disponibilité' => 'Invalid availability selected.']);
        }



        $ressource->update($request->all());

        return redirect()->route('Front.Ressource.index')->with('success', 'Ressource updated successfully.');
    }

    /**
     * Remove the specified ressource from the database.
     */
    public function destroy(Ressource $ressource)
    {
        $ressource->delete();

        return redirect()->route('ressources.index')->with('success', 'Ressource deleted successfully.');
    }
}